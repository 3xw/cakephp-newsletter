<?php
namespace Trois\Newsletter\Controller\Admin;

use Trois\Newsletter\Controller\AppController;

/**
 * MailingLists Controller
 *
 * @property \Trois\Newsletter\Model\Table\MailingListsTable $MailingLists
 *
 * @method \Trois\Newsletter\Model\Entity\MailingList[] paginate($object = null, array $settings = [])
 */
class MailingListsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mailingLists = $this->paginate($this->MailingLists);

        $this->set(compact('mailingLists'));
        $this->set('_serialize', ['mailingLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Mailing List id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mailingList = $this->MailingLists->get($id, [
            'contain' => ['Newsletters', 'Contacts']
        ]);

        $this->set('mailingList', $mailingList);
        $this->set('_serialize', ['mailingList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mailingList = $this->MailingLists->newEntity();
        if ($this->request->is('post')) {
            $mailingList = $this->MailingLists->patchEntity($mailingList, $this->request->getData());
            if ($this->MailingLists->save($mailingList)) {
                $this->Flash->success(__('The mailing list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mailing list could not be saved. Please, try again.'));
        }
        $newsletters = $this->MailingLists->Newsletters->find('list', ['limit' => 200]);
        $this->set(compact('mailingList', 'newsletters'));
        $this->set('_serialize', ['mailingList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mailing List id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mailingList = $this->MailingLists->get($id, [
            'contain' => ['Newsletters']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mailingList = $this->MailingLists->patchEntity($mailingList, $this->request->getData());
            if ($this->MailingLists->save($mailingList)) {
                $this->Flash->success(__('The mailing list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mailing list could not be saved. Please, try again.'));
        }
        $newsletters = $this->MailingLists->Newsletters->find('list', ['limit' => 200]);
        $this->set(compact('mailingList', 'newsletters'));
        $this->set('_serialize', ['mailingList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mailing List id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mailingList = $this->MailingLists->get($id);
        if ($this->MailingLists->delete($mailingList)) {
            $this->Flash->success(__('The mailing list has been deleted.'));
        } else {
            $this->Flash->error(__('The mailing list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
