<?php
Thread extends Threaded implements Countable , Traversable , ArrayAccess {
/* Methods */
public void detach ( void )
public int getCreatorId ( void )
public static Thread getCurrentThread ( void )
public static int getCurrentThreadId ( void )
public int getThreadId ( void )
public static mixed globally ( void )
public bool isJoined ( void )
public bool isStarted ( void )
public bool join ( void )
public void kill ( void )
public bool start ([ int $options ] )
/* Inherited methods */
public array Threaded::chunk ( int $size , bool $preserve )
public int Threaded::count ( void )
public bool Threaded::extend ( string $class )
public Threaded Threaded::from ( Closure $run [, Closure $construct [, array $args ]] )
public array Threaded::getTerminationInfo ( void )
public bool Threaded::isRunning ( void )
public bool Threaded::isTerminated ( void )
public bool Threaded::isWaiting ( void )
public bool Threaded::lock ( void )
public bool Threaded::merge ( mixed $from [, bool $overwrite ] )
public bool Threaded::notify ( void )
public bool Threaded::notifyOne ( void )
public bool Threaded::pop ( void )
public void Threaded::run ( void )
public mixed Threaded::shift ( void )
public mixed Threaded::synchronized ( Closure $block [, mixed $... ] )
public bool Threaded::unlock ( void )
public bool Threaded::wait ([ int $timeout ] )
}
class workerThread extends Thread {
	public function __construct($i){
	  $this->i=$i;
}

public function run(){
	  while(true){
	   echo $this->i;
	   sleep(1);
  }
}
}

for($i=0;$i<50;$i++){
$workers[$i]=new workerThread($i);
$workers[$i]->start();
}

?>