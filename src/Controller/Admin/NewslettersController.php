<?php
namespace Trois\Newsletter\Controller\Admin;

use Trois\Newsletter\Controller\AppController;
use Cake\Mailer\Email;

/**
* Newsletters Controller
*
* @property \Trois\Newsletter\Model\Table\NewslettersTable $Newsletters
*
* @method \Trois\Newsletter\Model\Entity\Newsletter[] paginate($object = null, array $settings = [])
*/
class NewslettersController extends AppController
{

  public function testSend(){
    if ($this->request->is('post')) {
      $this->_send($this->request->data['newsletter_id'], $this->request->data['to'], $this->request->data['to']);
      $this->Flash->success(__('The newsletter has been sent.'));
      return $this->redirect($this->referer());
    }
  }

  public function send($news_id){

    if ($this->request->is('post')) {
      $newsletter = $this->Newsletters->get($news_id, [
        'contain'=>[
          'MailingLists'=>['Contacts'],
          'Posts' => [
            'Attachments', 'Categories'
          ]
        ]
      ]);
      $subscribers = [];
      foreach ($newsletter->mailing_lists as $list) {
        foreach ($list->contacts as $subsciber) {
          if ($list) {
            if($subsciber->subscribe){
              $subscribers[] = $subsciber->email;
            }
          }
        }
      }
      if ($this->_send($news_id, 'info@bilatinvestigation.ch',$subscribers )) {
        $newsletter->sended = date('Y-m-d H:i:s');
        $newsletter->nb_sent = count($subscribers);
        $this->Newsletters->save($newsletter);
        $this->Flash->success(__('The newsletter has been sent.'));
        return $this->redirect($this->referer());
      }else{
        $this->Flash->error(__('The newsletter has not been sent.'));
        return $this->redirect($this->referer());
      }
    }
  }



  private function _send($newsletter_id, $to_emails, $to_bcc){
    $newsletter = $this->Newsletters->get($newsletter_id, [
      'contain'=>[
        'Posts' => [
          'Attachments', 'Categories'
        ]
      ]
    ]);
    $email = new Email();
    $email->subject($newsletter->subject);
    $email->template('newsletter_content', 'Trois/Newsletter.newsletter_layout');
    $email->emailFormat('html');
    $email->to($to_emails);
    $email->bcc($to_bcc);
    $email->helpers(['Attachment.Attachment']);
    $email->viewVars(['newsletter'=> $newsletter]);
    if($email->send()){
      return true;
    }else{
      return false;
    }

  }

  /**
  * Index method
  *
  * @return \Cake\Http\Response|void
  */
  public function index()
  {
    $newsletters = $this->paginate($this->Newsletters);

    $this->set(compact('newsletters'));
    $this->set('_serialize', ['newsletters']);
  }

  /**
  * View method
  *
  * @param string|null $id Newsletter id.
  * @return \Cake\Http\Response|void
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    $newsletter = $this->Newsletters->get($id, [
      'contain' => ['MailingLists', 'Posts'=>['Attachments']]
    ]);

    $this->set('newsletter', $newsletter);
    $this->set('_serialize', ['newsletter']);
  }

  /**
  * Add method
  *
  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
  */
  public function add()
  {
    $newsletter = $this->Newsletters->newEntity();
    if ($this->request->is('post')) {
      $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->getData());
      if ($this->Newsletters->save($newsletter)) {
        $this->Flash->success(__('The newsletter has been saved.'));
        return $this->redirect(['action' => 'view', $newsletter->id]);
      }
      $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
    }
    $mailingLists = $this->Newsletters->MailingLists->find('list', ['limit' => 200]);
    $posts = $this->Newsletters->Posts->find('list', ['limit' => 200]);
    $this->set(compact('newsletter', 'mailingLists', 'posts'));
    $this->set('_serialize', ['newsletter']);
  }

  /**
  * Edit method
  *
  * @param string|null $id Newsletter id.
  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function edit($id = null)
  {
    $newsletter = $this->Newsletters->get($id, [
      'contain' => ['MailingLists', 'Posts']
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->getData());
      if ($this->Newsletters->save($newsletter)) {
        $this->Flash->success(__('The newsletter has been saved.'));

        return $this->redirect(['action' => 'view', $newsletter->id]);
      }
      $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
    }
    $mailingLists = $this->Newsletters->MailingLists->find('list', ['limit' => 200]);
    $posts = $this->Newsletters->Posts->find('list', ['limit' => 200]);
    $this->set(compact('newsletter', 'mailingLists', 'posts'));
    $this->set('_serialize', ['newsletter']);
  }

  /**
  * Delete method
  *
  * @param string|null $id Newsletter id.
  * @return \Cake\Http\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $newsletter = $this->Newsletters->get($id);
    if ($this->Newsletters->delete($newsletter)) {
      $this->Flash->success(__('The newsletter has been deleted.'));
    } else {
      $this->Flash->error(__('The newsletter could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
