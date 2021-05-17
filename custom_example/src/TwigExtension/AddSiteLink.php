<?php
namespace Drupal\custom_example\TwigExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Drupal\node\Entity\Node;
/**
 * Class TwigFunctionExtension.
 */
class AddSiteLink extends \Twig_Extension {
  /**
   * This is the same name we used on the services.yml file
   */
  public function getName() {
    return 'custom_example.twig_extension';
  }

  // Basic definition of the filter. You can have multiple filters of course.

  public function getFunctions() {
    return [
      new TwigFunction('get_node_title', [$this, 'getTitle']),
    ];
  }
  // The actual implementation of the filter.
  public function getTitle($nid) {
    
    return Node::load($nid)->get('title')->value;
     
  }
}