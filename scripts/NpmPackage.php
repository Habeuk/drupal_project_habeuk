<?php

namespace DrupalHabeuk;

use Composer\Script\Event;
use Symfony\Component\Finder\Finder;
use DrupalFinder\DrupalFinder;

/**
 * Class NpmPackage.
 *
 * @package DrupalSkeletor
 */
class NpmPackage {
  
  /**
   * NPM Install.
   *
   * @param \Composer\Script\Event $event
   *        Event to echo output.
   */
  public static function PostInstall(Event $event) {
    \DrupalHabeuk\GiveAccessInDirs::GiveAccess($event);
    static::runNpmCommand('npm install', $event);
  }
  
  /**
   * Helper to run arbitrary npm scripts.
   *
   * @param string $command
   *        Command to run.
   * @param \Composer\Script\Event $event
   *        Event to echo output.
   */
  protected static function runNpmCommand($command, Event $event) {
    $packageRoot = static::getPackageRoot();
    foreach (static::findNpmPackages($packageRoot) as $package) {
      $path = $package->getRelativePath();
      $event->getIO()->write(" Running  $command in $path");
      exec("cd $packageRoot/$path;  $command");
    }
  }
  
  /**
   * Get Package Root.
   *
   * @return string Path to Drupal Root.
   */
  protected static function getPackageRoot() {
    $drupalFinder = new DrupalFinder();
    if ($drupalFinder->locateRoot(getcwd())) {
      return $drupalFinder->getDrupalRoot();
    }
  }
  
  /**
   * Find the NPM packages, excluding some directories.
   *
   * @param string $packageRoot
   *        Path to Drupal Root.
   *        
   * @return array Array of found package.json files.
   */
  protected static function findNpmPackages($packageRoot) {
    // Find all npm instances in the package root,
    // that are not contained in contrib, vendor or node_module directories.
    $finder = new Finder();
    
    // On specifie ou on doit rechercher.
    $finder->in($packageRoot)->notPath("/node_modules/");
    $finder->path("/wb_universe");
    return $finder->name("package.json");
  }
  
}
