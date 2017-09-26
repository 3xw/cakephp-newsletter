<?php
namespace Trois\Newsletter\Controller;

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


  /**
  * Add method
  *
  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
  */
  public function subscribe()
  {
    $contact = $this->Contacts->newEntity();
    if ($this->request->is('post')) {
      $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
      if ($this->Contacts->save($contact)) {
        $this->Flash->success(__('You have been added to our mailing list.'));
        return $this->redirect($this->referer());
      }
      $this->Flash->error(__('The email already exist or this email is not valid.'));
      return $this->redirect($this->referer());
    }
    $this->set(compact('contact'));
    $this->set('_serialize', ['contact']);
  }

  /**
  * Edit method
  *
  * @param string|null $id Contact id.
  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
  * @throws \Cake\Network\Exception\NotFoundException When record not found.
  */
  public function unsubscribe()
  {
    $contact = $this->Contacts->findByEmail($this->request->data['email'])->first();
    if($contact){
      $contact->subscribe = false;
      $this->Contacts->save($contact);
      $this->Flash->success(__('This email has been correctly removed.'));
      return $this->redirect($this->referer());
    }else{
      $this->Flash->error(__('This email could not be found. Please, try again.'));
      return $this->redirect($this->referer());
    }
  }
}
