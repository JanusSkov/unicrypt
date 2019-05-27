<?php

/**
 * Simple Encryption/Decryption class based on the OpenSSL Library
 * Written by Janus Christian Skov 2018
 */

class unicrypt {

	private $secret_key = 'add-unique-key-here';  

	private $init_vector_key = 'add-unique-key-here';

	# Add a valid AES cipher
	private $cipher = 'AES-192-CFB1'; // by default 
	


	# Parcing the secret key
	public function set_secret_key($key) {
		$this->secret_key = $key;
	}
	
	# Collecting the secret key hashed
	public function get_secret_key() {
		return hash('sha256', $this->secret_key);
	}


	
	# Parcing the initialization vector key
	public function set_init_vector_key($iv) {
		$this->init_vector_key = $iv;
	}
	
	# Collecting the initialization vector key hashed and shorten
	public function get_init_vector_key() {
		return substr(hash('sha256',$this->init_vector_key), 0, 16);
	}


	
	# parcing the AES cipher method
	public function set_cipher($cipher) {
		$this->cipher = $cipher;
	}
	
	# Collecting the cipher method
	public function get_cipher() {
		return $this->cipher;
	}


	
	# OpenSSL encryption with keys and cipher method, encoded with MIME base64 as binary wrapper  
	public function encrypt($string) {
		
		$cipher 		= $this->get_cipher();
		$secret_key 	= $this->get_secret_key();
		$init_vector    = $this->get_init_vector_key();

		return base64_encode(openssl_encrypt($string, $cipher, $secret_key, 0, $init_vector));
	}
	
	# OpenSSL decryption with secret key, init vector key and a chosen cipher method
	public function decrypt($string) {
		
		$cipher 		= $this->get_cipher();
		$secret_key 	= $this->get_secret_key();
		$init_vector    = $this->get_init_vector_key();

		return openssl_decrypt(base64_decode($string), $cipher, $secret_key, 0, $init_vector);
	}
}