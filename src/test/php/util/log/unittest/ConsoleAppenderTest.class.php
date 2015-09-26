<?php namespace util\log\unittest;

use unittest\TestCase;
use util\cmd\Console;
use util\log\ConsoleAppender;
use util\log\LogCategory;
use util\log\Layout;
use util\log\LoggingEvent;
use io\streams\MemoryOutputStream;

/**
 * TestCase
 *
 * @see   xp://util.cmd.Console
 * @see   xp://util.log.ConsoleAppender
 */
class ConsoleAppenderTest extends TestCase {
  private $cat, $stream;

  /**
   * Sets up test case and backups Console::$err stream.
   *
   * @return void
   */
  public function setUp() {
    $this->cat= (new LogCategory('default'))->withAppender(
      (new ConsoleAppender())->withLayout(newinstance(Layout::class, [], [
        'format' => function(LoggingEvent $event) {
          return implode(' ', $event->getArguments());
        }
      ]))
    );
    $this->stream= Console::$err->getStream();
  }

  /**
   * Restores Console::$err stream.
   *
   * @return void
   */
  public function tearDown() {
    Console::$err->setStream($this->stream);
  }

  #[@test]
  public function appendMessage() {
    with ($message= 'Test', $stream= new MemoryOutputStream()); {
      Console::$err->setStream($stream);
      $this->cat->warn($message);
      $this->assertEquals($message, $stream->getBytes());
    }
  }
}
