<?php namespace util\log;

use util\Objects;

/**
 * Takes care of formatting log entries
 */
abstract class Layout {

  /**
   * Creates a string representation of the given argument. For any 
   * string given, the result is the string itself, for any other type,
   * the result is the xp::stringOf() output.
   *
   * @param   var arg
   * @return  string
   */
  protected function stringOf($arg) {
    return is_string($arg) ? $arg : Objects::stringOf($arg);
  }

  /**
   * Formats a logging event according to this layout
   *
   * @param   util.log.LoggingEvent event
   * @return  string
   */
  public abstract function format(LoggingEvent $event);
}
