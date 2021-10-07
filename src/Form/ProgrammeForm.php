<?php

namespace Drupal\occapi_entities\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the programme entity edit forms.
 */
class ProgrammeForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New programme %label has been created.', $message_arguments));
      $this->logger('occapi_entities')->notice('Created new programme %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The programme %label has been updated.', $message_arguments));
      $this->logger('occapi_entities')->notice('Updated new programme %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.programme.canonical', ['programme' => $entity->id()]);
  }

}
