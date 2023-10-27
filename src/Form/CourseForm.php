<?php

namespace Drupal\occapi_entities\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\RendererInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form controller for the course entity edit forms.
 */
class CourseForm extends ContentEntityForm {

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    $instance = parent::create($container);
    $instance->renderer = $container->get('renderer');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => $this->renderer->render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New course %label has been created.', $message_arguments));
      $this->logger('occapi_entities')->notice('Created new course %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The course %label has been updated.', $message_arguments));
      $this->logger('occapi_entities')->notice('Updated new course %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.course.canonical', ['course' => $entity->id()]);
  }

}
