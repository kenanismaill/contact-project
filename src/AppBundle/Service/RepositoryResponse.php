<?php


namespace App\Service;


class RepositoryResponse
{
    /**
     * @var bool
     */
    private $success;
    
    /**
     * @var string
     */
    private $message;
    
    /**
     * @var mixed
     */
    private $response;
    
    public function __construct($response = null, bool $success = true, string $message = "successful")
    {
        $this->setSuccess($success)->setMessage($message)->setResponse($response);
    }
    
    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }
    
    /**
     * @param bool $success
     * @return RepositoryResponse
     */
    public function setSuccess(bool $success): RepositoryResponse
    {
        $this->success = $success;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    
    /**
     * @param string $message
     * @return RepositoryResponse
     */
    public function setMessage(string $message): RepositoryResponse
    {
        $this->message = $message;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }
    
    /**
     * @param mixed $response
     * @return RepositoryResponse
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }
}