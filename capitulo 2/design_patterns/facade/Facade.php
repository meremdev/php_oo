<?php
    class PagSeguroFacade{
        private $request;

        public function __construct($currency)
        {
            $this->request = new PagSeguroPaymentRequest();
            $this->request->setCurrency($currency);
        }

        public function addItem($product, $amount){
            $item = new PagSeguroItem;
            $item->setId($product->id);
            $item->setDescription($product->description);
            $item->setQuantity($data->amount);
            $item->setAmount($product->price);

            $this->request->addItem($item);
        }

        public function setCustomer($customer){
            $address = new PagSeguroAddress;
            $address->setPostalCode($customer->postal);
            $address->setStreet($customer->address);
            $address->setNumber($customer->number);
            $address->setDistrict($customer->district);
            $address->setCity($customer->city);
            $address->setState($customer->state);

            $this->request->setShipingAddress($address);

            $sender = new PagSeguroSender;
            $sender->setName(trim($customer->name));
            $sender->setEmail(trim($customer->email));
            $this->request->setSender($sender);
        }

        public function process(){
            //..
        }
    }