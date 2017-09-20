<?php
namespace Trois\Newsletter\Controller\Admin;

use Trois\Newsletter\Controller\AppController;

/**
 * Contacts Controller
 *
 * @property \Trois\Newsletter\Model\Table\ContactsTable $Contacts
 *
 * @method \Trois\Newsletter\Model\Entity\Contact[] paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{

  public function import()
  {
    $contact = $this->Contacts->newEntity();
    if ($this->request->is('post')) {
      if(empty($this->request->data['file']) || $this->request->data['file']['error'] !== 0)
      {
        $this->Flash->error(__('Import file dosen\'t work. Please, try again.'));
      }else{
        $string = file_get_contents($this->request->data['file']['tmp_name']);
        preg_match_all(
          '/[a-zA-z0-9.-]+\@[a-zA-z0-9.-]+\.[a-zA-Z]{2,3}/',
          $string,
          $matches
        );
        if(empty($matches)){
          $this->Flash->error(__('No contact found. Please, try again.'));
        }else{
          $contacts = [];
          $check = [];
          foreach($matches[0] as $match)
          {
            if(!empty($check[$match]))
              continue;
            $check[$match] = true;
            array_push($contacts,[
              'email' => $match,
              'mailing_list_id' => $this->request->data['mailing_list_id']
            ]);
          }
          $entities = $this->Contacts->newEntities($contacts);
          $result = $this->Contacts->saveMany($entities);
          if (!empty($result)) {
            $this->Flash->success(count($entities).' '.__('contacts have been saved.'));
            return $this->redirect(['action' => 'index']);
          }else{
            $this->Flash->error(__('The contacts could not be saved. Please, try again.'));
          }
        }
      }
    }
    $mailingLists = $this->Contacts->MailingLists->find('list', ['limit' => 200]);
    $this->set(compact('contact', 'mailingLists'));
    $this->set('_serialize', ['contact']);
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MailingLists']
        ];
        $contacts = $this->paginate($this->Contacts);

        $this->set(compact('contacts'));
        $this->set('_serialize', ['contacts']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['MailingLists']
        ]);

        $this->set('contact', $contact);
        $this->set('_serialize', ['contact']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $mailingLists = $this->Contacts->MailingLists->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'mailingLists'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $mailingLists = $this->Contacts->MailingLists->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'mailingLists'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
