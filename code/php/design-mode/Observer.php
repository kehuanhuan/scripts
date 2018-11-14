<?php
interface IObserver
{
  function onChanged( $sender, $args );
}

interface IObservable
{
  function addObserver( $observer );
}

class UserList implements IObservable
{
  private $_observers = array();

  public function addCustomer( $name )
  {
    foreach( $this->_observers as $obs )
      $obs->onChanged( $this, $name );
  }

  public function addObserver( $observer )
  {
    $this->_observers []= $observer;
  }
}

class UserListLogger implements IObserver
{
  public function onChanged( $sender, $args )
  {
    echo( "'$args' added to user list\n" );
  }
}

$ul = new UserList();
$ul->addObserver( new UserListLogger() );
$ul->addCustomer( "Jack" );
