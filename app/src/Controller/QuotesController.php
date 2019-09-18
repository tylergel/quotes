<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\View\View;
use Dompdf\Dompdf;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class QuotesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
     public function savepdf($quote_id) {


     }
     public function list() {
       $quoteinfoTable = TableRegistry::get('Quoteinfo');
       $quotes = $quoteinfoTable->find('all')->toArray();

       foreach($quotes as $key=>$q) {
         $companyinfoTable = TableRegistry::get('Companyinfo');
         $companyinfo = $companyinfoTable->find('all', [
            'conditions' => ['Companyinfo.id' => $q['company_id']]
        ])->toArray();
         $quotes[$key]['company'] = $companyinfo;

         $customerinfoTable = TableRegistry::get('Customerinfo');
         $customerinfo = $customerinfoTable->find('all', [
            'conditions' => ['Customerinfo.id' => $q['customer_id']]
        ])->toArray();
         $quotes[$key]['customer'] = $customerinfo;

         $productinfoTable = TableRegistry::get('Productinfo');
         $productinfo = $productinfoTable->find('all', [
            'conditions' => ['Productinfo.quote_id' => $q['id']]
        ])->toArray();
         $quotes[$key]['product'] = $productinfo;
       }

       $this->set('quotes', $quotes);
     }
     public function index($error) {
         if($error == "error") {
        $this->Flash->set('An error has occured.  Make sure you selected a product.', [
        'element' => 'error'
    ]);
         }
       $quoteinfoTable = TableRegistry::get('Quoteinfo');
       $count = $quoteinfoTable->find('all')->count();
       $this->set('count', $count);
       
       $companyinfoTable = TableRegistry::get('Companyinfo');
       $companies = $companyinfoTable->find('all');
       $this->set('companies', $companies);
       
       $customerinfoTable = TableRegistry::get('Customerinfo');
       $customers = $customerinfoTable->find('all');
       $this->set('customers', $customers);

     }

     public function downloadpdf($a) {
       $quoteinfoTable = TableRegistry::get('Quoteinfo');
       $quotes = $quoteinfoTable->find('all', [
          'conditions' => ['Quoteinfo.id' => $a]
      ])->toArray();

       foreach($quotes as $key=>$q) {
         $companyinfoTable = TableRegistry::get('Companyinfo');
         $companyinfo = $companyinfoTable->find('all', [
            'conditions' => ['Companyinfo.quote_id' => $q['id']]
        ])->toArray();
         $quotes[$key]['company'] = $companyinfo;

         $customerinfoTable = TableRegistry::get('Customerinfo');
         $customerinfo = $customerinfoTable->find('all', [
            'conditions' => ['Customerinfo.quote_id' => $q['id']]
        ])->toArray();
         $quotes[$key]['customer'] = $customerinfo;

         $productinfoTable = TableRegistry::get('Productinfo');
         $productinfo = $productinfoTable->find('all', [
            'conditions' => ['Productinfo.quote_id' => $q['id']]
        ])->toArray();
         $quotes[$key]['product'] = $productinfo;
       }
       $quote = $quotes[0];
       $file_name = $a . '.csv';
       $this->set('quote', $quote);
       require_once (ROOT .DS. 'vendor' .DS. 'vendor' .DS. 'autoload.php' );
       

     }
     public function view($a) {

       $quoteinfoTable = TableRegistry::get('Quoteinfo');
       $quotes = $quoteinfoTable->find('all', [
          'conditions' => ['Quoteinfo.id' => $a]
      ])->toArray();

       foreach($quotes as $key=>$q) {
         $companyinfoTable = TableRegistry::get('Companyinfo');
         $companyinfo = $companyinfoTable->find('all', [
            'conditions' => ['Companyinfo.id' => $q['company_id']]
        ])->toArray();
         $quotes[$key]['company'] = $companyinfo;

         $customerinfoTable = TableRegistry::get('Customerinfo');
         $customerinfo = $customerinfoTable->find('all', [
            'conditions' => ['Customerinfo.id' => $q['customer_id']]
        ])->toArray();
         $quotes[$key]['customer'] = $customerinfo;

         $productinfoTable = TableRegistry::get('Productinfo');
         $productinfo = $productinfoTable->find('all', [
            'conditions' => ['Productinfo.quote_id' => $q['id']]
        ])->toArray();
         $quotes[$key]['product'] = $productinfo;
       }

       $this->set('quote', $quotes[0]);
       $this->set('id', $a);
     }
     public function new() {
      if ($this->request->is('post')) {
       $data = $this->request->getData();
       $customer_id = "";
       $company_id = "";
       
       if(isset($data['customer_select_id']) && $data['customer_select_id'] != ""  && $data['customer_select_id'] != "choose") {
           $customer_id = $data['customer_select_id'];
       }
        if(isset($data['company_id']) && $data['company_id'] != ""  && $data['company_id'] != "choose") {
           $company_id = $data['company_id'];
       }
       
        
       $companyInfo = [];
       $companyInfo['company_name'] = $data['company_name'];
       $companyInfo['phone_number'] = $data['phone_number'];
       $companyInfo['email'] = $data['email'];
       $companyInfo['street_address'] = $data['street_address'];
       
       $customerInfo = [];
       $customerInfo['customer_company_name'] = $data['customer_company_name'];
       $customerInfo['customer_name'] = $data['customer_name'];
       $customerInfo['customer_id'] = $data['customer_id'];
       $customerInfo['customer_phone_number'] = $data['customer_phone_number'];
       $customerInfo['customer_street_address'] = $data['customer_street_address'];
       $customerInfo['customer_email'] = $data['customer_email'];

        if($company_id == "") { 
               $companyinfoTable = TableRegistry::get('Companyinfo');
               $company_info = $companyinfoTable->newEntity($companyInfo);
               $company_id = $companyinfoTable->save($company_info);
               $company_id = $company_id->id;
           }
       
         if($customer_id == "") { 
           $customerinfoTable = TableRegistry::get('Customerinfo');
           $customer_info = $customerinfoTable->newEntity($customerInfo);
           $customer_id = $customerinfoTable->save($customer_info);
           $customer_id = $customer_id->id;
       }
       
       $quoteInfo = [];
       $quoteInfo['date'] = $data['date'];
       $quoteInfo['valid_date'] = $data['valid_date'];
       $quoteInfo['prepared_by'] = $data['prepared_by'];
       $quoteInfo['subject'] = $data['subject'];
       $quoteInfo['total'] = $data['quote_total'];
       $quoteInfo['description'] = $data['description'];
       $quoteInfo['customer_id'] = $customer_id;
       $quoteInfo['company_id'] = $company_id;
       

      $quoteinfoTable = TableRegistry::get('Quoteinfo');
      $quote = $quoteinfoTable->newEntity($quoteInfo);
      $quote_id = '';
      if ($quoteinfoTable->save($quote)) {
          $quote_id = $quote->id;
       }
       
       
     

       foreach($data['product'] as $product) {
         $currentProduct = [];
         $currentProduct = $product;
         $currentProduct['quote_id'] = $quote_id;
         $productTable = TableRegistry::get('Productinfo');
         $product_info = $productTable->newEntity($currentProduct);
         $productTable->save($product_info);
       }

     }
     return $this->redirect(
            ['controller' => 'Quotes', 'action' => 'list']
        );

     }
     
     public function delete($quote_id) {
              $quoteinfoTable = TableRegistry::get('Quoteinfo');
             $entity = $quoteinfoTable->get($quote_id);
            $result = $quoteinfoTable->delete($entity);
            
     return $this->redirect(
            ['controller' => 'Quotes', 'action' => 'list']
        );
         
     }
     
     public function customers() {
          $customerinfoTable = TableRegistry::get('Customerinfo');
       $customers = $customerinfoTable->find('all');
       $this->set('customers', $customers);
         
     }
     public function newcustomer() {
          
        if ($this->request->is('post')) {
       $data = $this->request->getData();
       $customerInfo = [];
       $customerInfo['customer_company_name'] = $data['customer_company_name'];
       $customerInfo['customer_name'] = $data['customer_name'];
       $customerInfo['customer_id'] = $data['customer_id'];
       $customerInfo['customer_phone_number'] = $data['customer_phone_number'];
       $customerInfo['customer_street_address'] = $data['customer_street_address'];
       $customerInfo['customer_email'] = $data['customer_email'];
 
        
           $customerinfoTable = TableRegistry::get('Customerinfo');
           $customer_info = $customerinfoTable->newEntity($customerInfo);
           $customerinfoTable->save($customer_info);
           
           
    
        }
            return $this->redirect(
            ['controller' => 'Quotes', 'action' => 'customers']
                );
         
     }
     public function deletecompany($companyid) {
           $companyinfoTable = TableRegistry::get('Companyinfo');
             $entity = $companyinfoTable->get($companyid);
            $result = $companyinfoTable->delete($entity);
            
     return $this->redirect(
            ['controller' => 'Quotes', 'action' => 'companies']
        );
     }
     public function deletecustomer($customerid) {
           $customerinfoTable = TableRegistry::get('Customerinfo');
             $entity = $customerinfoTable->get($customerid);
            $result = $customerinfoTable->delete($entity);
            
     return $this->redirect(
            ['controller' => 'Quotes', 'action' => 'customers']
        );
     }
     public function newcompany() {
         if ($this->request->is('post')) {
       $data = $this->request->getData();
         
       $companyInfo = [];
       $companyInfo['company_name'] = $data['company_name'];
       $companyInfo['phone_number'] = $data['phone_number'];
       $companyInfo['email'] = $data['email'];
       $companyInfo['street_address'] = $data['street_address'];
       
       $companyinfoTable = TableRegistry::get('Companyinfo');
       $company_info = $companyinfoTable->newEntity($companyInfo);
       $companyinfoTable->save($company_info);
         }
          return $this->redirect(
            ['controller' => 'Quotes', 'action' => 'companies']
        );
     }
     public function companies() {
         
           $companyinfoTable = TableRegistry::get('Companyinfo');
       $companies = $companyinfoTable->find('all');
       $this->set('companies', $companies);
         
     }
    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}
