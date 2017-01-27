<?php

namespace Drupal\Tests\islandora\Kernel;

use Drupal\islandora\Entity\FedoraResource;
use Drupal\simpletest\UserCreationTrait;

/**
 * Base class for testing EventGenerator functionality.
 */
abstract class EventGeneratorTestBase extends IslandoraKernelTestBase {

  use UserCreationTrait;

  /**
   * User entity.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * Fedora resource entity.
   *
   * @var \Drupal\islandora\FedoraResourceInterface
   */
  protected $entity;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    // Create a test user.
    $this->user = $this->createUser(['add fedora resource entities']);

    // Create a test entity.
    $this->entity = FedoraResource::create([
      "type" => "rdf_source",
      "uid" => $this->user->get('uid'),
      "name" => "Test Fixture",
      "langcode" => "und",
      "status" => 1,
    ]);
    $this->entity->save();
  }

}
