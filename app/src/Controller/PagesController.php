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

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
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
     public function new() {
       $data = $this->request->data;
        debug("what"); die;
       $quoteInfo = [];
       $quoteInfo['date'] = $data['date'];
       $quoteInfo['valid_date'] = $data['valid_date'];
       $quoteInfo['prepared_by'] = $data['prepared_by'];

       $companyInfo = [];
       $companyInfo['company_name'] = $data['company_name'];
       $companyInfo['phone_number'] = $data['phone_number'];
       $companyInfo['street_address'] = $data['street_address'];

       $customerInfo = [];
       $customerInfo = $data['customer_company_name'];
       $customerInfo = $data['customer_name'];
       $customerInfo = $data['customer_id'];
       $customerInfo = $data['customer_phone_number'];
       $customerInfo = $data['customer_street_address'];

      $quoteinfoTable = TableRegistry::get('Quoteinfo');
      $quote = $quoteinfoTable->newEntity();
      $quote->date = $quoteInfo['date'];
      $quote->valid_date = $quoteInfo['valid_date'];
      $quote->prepared_by = $quoteInfo['prepared_by'];

      if ($quoteinfoTable->save($quote)) {
          // The $article entity contains the id now
          $quote_id = $quote->id;
      }

       foreach($data['product'] as $product) {
         $currentProduct = [];
         $currentProduct = $product;
         $currentProduct['quote_id'] = $quote_id;
       }
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
