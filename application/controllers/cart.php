<?php
	require_once APPPATH.'controllers/Base_Controller'.EXT;
	class Cart extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('product_model','Mproducts');
			$this->load->library('cart');
			
			
		}
		
		function views()
		{
			$data['total'] = $this->cart->total_items();//lay so san pham mua
			$data['subtotal'] = $this->cart->total();	
			$this->render($this->load->view('cart/views',$data,TRUE));
		}
		
		function add()
		{
			
			$act = $this->input->post('ok');
			$p_id = $this->input->post('id');
					
				$q = $this->Mproducts->cate_get($p_id);
				
				if($q->num_rows() > 0 ) {
					$items = $q->row();						
							$data = array(
							'id' => $items->p_id,
							'qty' => 1,
							'price' => $items->p_price,
							'name' => $items->p_name,
							'image' => $items->p_image
							);					
				}
				$this->cart->insert($data);
				
			
			
			redirect('cart/views');
	
		}
		function update()
		{
		// Lay tong so san pham
		$count = $this->cart->total_items();
		
		$_qty = $this->input->post('qty');
		$_rowid = $this->input->post('rowid');
		
		for($i = 0; $i < $count; $i++)
		{
			$rowid = $_rowid[$i];
			$qty = $_qty[$i];
			$data = array(
					'rowid' => $rowid,
					'qty' => $qty
					);
			
			
			$this->cart->update($data);
		} //End for
		
		redirect('cart/views','refresh');
		
		} // End function update()
		function remove($rowid)
		{
			$this->cart->update(array(
			'rowid' =>$rowid,
			'qty' =>0
			));
			redirect('cart/views');
		}
		/*function destroy()
		{
			$this->cart->destroy();
			redirect('cart/views');
		}*/
		function checkout()
		{
			$valid = $this->form_validation;
			$valid->set_rules('txtname','Username','trim|required|xss_clean');
			$valid->set_rules('txtemail','Email','trim|required|valid_email|xss_clean');
			$valid->set_rules('txtdiachi','Address','trim|required|xss_clean');
			$valid->set_rules('txtphone','Phone','trim|required|alpha_numeric|xss_clean');			
			$valid->set_rules('txtmessage','Message','trim|required|xss_clean');
			$data['email'] = $this->input->post('txtemail');
			$data['message'] = $this->input->post('txtmessage');
			$data['hoten']   = $this->input->post('txtname');
			$data['phone']   = $this->input->post('txtphone');
			$data['address']   = $this->input->post('txtdiachi');
			$data['cart_content'] = $this->cart->contents();
			$url = base_url().'index.php/main';
			$data['subtotal'] = $this->cart->total();
			$act = $this->input->post('ok');
			if($valid->run() == FALSE)
			{
				$data['error'] = 'Yêu cầu bạn nhập thông tin đầy đủ';
				
			}
			else
			{
				if($act == 'Thanh toán')
				{
					$this->loadMail();
					$this->email->from($data['email']);
					$this->email->to('nongtinh3@gmail.com');
					$this->email->subject('THÔNG TIN ĐẶT HÀNG - SHOP FPT');
					$this->email->message($this->load->view('cart/contact_order', $data,TRUE));					
					if($this->email->send()) {
				// Neu dat hang thanh cong thi huy tat ca seesion cart
				$this->cart->destroy();
				$data['error'] = 
				'Thông tin đặt hàng của bạn đã được chuyển đến chúng tôi. Chúng tôi sẽ trả lời bạn ngay sau 24h';
			} else {
				$data['error'] = 'Xin lỗi.Có lỗi trong quá trình thực hiện lệnh'; 
			}
				
		
				}
						
			}
			$this->render($this->load->view('cart/checkout',$data,TRUE));
		}
	}
?>