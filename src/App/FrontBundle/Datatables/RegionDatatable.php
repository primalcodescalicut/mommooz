<?php

namespace App\FrontBundle\Datatables;

use Sg\DatatablesBundle\Datatable\View\AbstractDatatableView;
use Sg\DatatablesBundle\Datatable\View\Style;

/**
 * Class RegionDatatable
 *
 * @package App\FrontBundle\Datatables
 */
class RegionDatatable extends AbstractDatatableView
{
    /**
     * {@inheritdoc}
     */
    public function buildDatatable(array $options = array())
    {
        $this->topActions->set(array(
            'start_html' => '<div class="row"><div class="col-sm-3">',
            'end_html' => '<hr></div></div>',
            'actions' => array(
                array(
                    'route' => $this->router->generate('region_new'),
                    'label' => $this->translator->trans('region.actions.new'),
                    'icon' => 'glyphicon glyphicon-plus',
                    'attributes' => array(
                        'rel' => 'tooltip',
                        'title' => $this->translator->trans('region.actions.new'),
                        'class' => 'btn btn-primary',
                        'role' => 'button',
                        'onclick' => 'return false;',
                        'ng-click' => 'toggleModal($event);',
                        'modalTitle' => $this->translator->trans('region.title.new'),
                    ),
                )
            )
        ));

        $this->features->set(array(
            'auto_width' => true,
            'defer_render' => false,
            'info' => true,
            'jquery_ui' => false,
            'length_change' => true,
            'ordering' => true,
            'paging' => true,
            'processing' => true,
            'scroll_x' => false,
            'scroll_y' => '',
            'searching' => true,
            'state_save' => false,
            'delay' => 0,
            'extensions' => array(),
            'highlight' => false,
            'highlight_color' => 'red'
        ));

        $this->ajax->set(array(
            'url' => $this->router->generate('region_results'),
            'type' => 'GET',
            'pipeline' => 0
        ));

        $this->options->set(array(
            'display_start' => 0,
            'defer_loading' => -1,
            'dom' => 'lfrtip',
            'length_menu' => array(5, 10, 25, 50, 100),
            'order_classes' => true,
            'order' => array(array(0, 'asc')),
            'order_multi' => true,
            'page_length' => 5,
            'paging_type' => Style::FULL_NUMBERS_PAGINATION,
            'renderer' => '',
            'scroll_collapse' => false,
            'search_delay' => 0,
            'state_duration' => 7200,
            'stripe_classes' => array(),
            'class' => Style::BOOTSTRAP_3_STYLE,
            'individual_filtering' => false,
            'individual_filtering_position' => 'head',
            'use_integration_options' => true,
            'force_dom' => false,
            'row_id' => 'id'
        ));

        $this->columnBuilder
            ->add('id', 'column', array(
                'title' => 'Id',
            ))
            ->add('regionName', 'column', array(
                'title' => 'Region Name',
            ))
            ->add('status', 'boolean', array(
                'title' => 'Status',
            ))
            ->add('createdOn', 'datetime', array(
                'title' => 'Created on',
            ))
            ->add('state.stateName', 'column', array(
                'title' => 'State',
            ))
            ->add(null, 'action', array(
                'title' => $this->translator->trans('datatables.actions.title'),
                'actions' => array(
                    array(
                        'route' => 'region_edit',
                        'route_parameters' => array(
                            'id' => 'id'
                        ),
                        'label' => $this->translator->trans('region.actions.edit'),
                        'icon' => 'glyphicon glyphicon-edit',
                        'attributes' => array(
                            'rel' => 'tooltip',
                            'title' => $this->translator->trans('region.actions.edit'),
                            'class' => 'btn btn-primary btn-xs',
                            'role' => 'button',
                            'onclick' => 'return openModal(event);',
                            'modalTitle' => $this->translator->trans('region.title.edit'),
                            'style' => 'margin-right:5px;'
                        ),
                    ),
                    array(
                        'route' => 'region_delete',
                        'route_parameters' => array(
                            'id' => 'id'
                        ),
                        'label' => $this->translator->trans('region.actions.delete'),
                        'icon' => 'glyphicon glyphicon-trash',
                        'attributes' => array(
                            'rel' => 'tooltip',
                            'title' => $this->translator->trans('region.actions.delete'),
                            'class' => 'btn btn-primary btn-xs',
                            'role' => 'button',
                            'onclick' => 'return openConfirm(event);',
                            'cofirmText' => $this->translator->trans('region.delete.confirm')
                        ),
                    )
                )
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return 'App\FrontBundle\Entity\Region';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'region_datatable';
    }
}
