<?php namespace util\log\unittest;

use unittest\TestCase;
use util\log\LogLevel;

class LogLevelTest extends TestCase {

  /**
   * Test named() method
   *
   */
  #[@test]
  public function namedInfo() {
    $this->assertEquals(LogLevel::INFO, LogLevel::named('INFO'));
  }

  /**
   * Test named() method
   *
   */
  #[@test]
  public function namedWarn() {
    $this->assertEquals(LogLevel::WARN, LogLevel::named('WARN'));
  }

  /**
   * Test named() method
   *
   */
  #[@test]
  public function namedError() {
    $this->assertEquals(LogLevel::ERROR, LogLevel::named('ERROR'));
  }

  /**
   * Test named() method
   *
   */
  #[@test]
  public function namedDebug() {
    $this->assertEquals(LogLevel::DEBUG, LogLevel::named('DEBUG'));
  }

  /**
   * Test named() method
   *
   */
  #[@test]
  public function namedAll() {
    $this->assertEquals(LogLevel::ALL, LogLevel::named('ALL'));
  }

  /**
   * Test named() method
   *
   */
  #[@test, @expect('lang.IllegalArgumentException')]
  public function unknown() {
    LogLevel::named('@UNKNOWN@');
  }
}
