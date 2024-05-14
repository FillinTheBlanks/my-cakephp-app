<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BlogPostsCategories Controller
 *
 * @property \App\Model\Table\BlogPostsCategoriesTable $BlogPostsCategories
 */
class BlogPostsCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->BlogPostsCategories->find()
            ->contain(['Categories', 'BlogPosts']);
        $blogPostsCategories = $this->paginate($query);

        $this->set(compact('blogPostsCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Blog Posts Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogPostsCategory = $this->BlogPostsCategories->get($id, contain: ['Categories', 'BlogPosts']);
        $this->set(compact('blogPostsCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blogPostsCategory = $this->BlogPostsCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $blogPostsCategory = $this->BlogPostsCategories->patchEntity($blogPostsCategory, $this->request->getData());
            if ($this->BlogPostsCategories->save($blogPostsCategory)) {
                $this->Flash->success(__('The blog posts category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog posts category could not be saved. Please, try again.'));
        }
        $categories = $this->BlogPostsCategories->Categories->find('list', limit: 200)->all();
        $blogPosts = $this->BlogPostsCategories->BlogPosts->find('list', limit: 200)->all();
        $this->set(compact('blogPostsCategory', 'categories', 'blogPosts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog Posts Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blogPostsCategory = $this->BlogPostsCategories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogPostsCategory = $this->BlogPostsCategories->patchEntity($blogPostsCategory, $this->request->getData());
            if ($this->BlogPostsCategories->save($blogPostsCategory)) {
                $this->Flash->success(__('The blog posts category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog posts category could not be saved. Please, try again.'));
        }
        $categories = $this->BlogPostsCategories->Categories->find('list', limit: 200)->all();
        $blogPosts = $this->BlogPostsCategories->BlogPosts->find('list', limit: 200)->all();
        $this->set(compact('blogPostsCategory', 'categories', 'blogPosts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog Posts Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogPostsCategory = $this->BlogPostsCategories->get($id);
        if ($this->BlogPostsCategories->delete($blogPostsCategory)) {
            $this->Flash->success(__('The blog posts category has been deleted.'));
        } else {
            $this->Flash->error(__('The blog posts category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
