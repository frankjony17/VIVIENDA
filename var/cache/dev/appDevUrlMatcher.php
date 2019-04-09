<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/quejas/cliente')) {
            // quejas_cliente_list
            if ($pathinfo === '/quejas/cliente/list') {
                return array (  '_controller' => 'QuejasBundle\\Controller\\ClienteController::listAction',  '_route' => 'quejas_cliente_list',);
            }

            // quejas_cliente_addedit
            if ($pathinfo === '/quejas/cliente/add-edit') {
                return array (  '_controller' => 'QuejasBundle\\Controller\\ClienteController::addEditAction',  '_route' => 'quejas_cliente_addedit',);
            }

            // quejas_cliente_remove
            if ($pathinfo === '/quejas/cliente/remove') {
                return array (  '_controller' => 'QuejasBundle\\Controller\\ClienteController::removeAction',  '_route' => 'quejas_cliente_remove',);
            }

        }

        if (0 === strpos($pathinfo, '/despacho')) {
            // quejas_despacho_list
            if ($pathinfo === '/despacho/list') {
                return array (  '_controller' => 'QuejasBundle\\Controller\\DespachoController::listAction',  '_route' => 'quejas_despacho_list',);
            }

            // quejas_despacho_addedit
            if ($pathinfo === '/despacho/add-edit') {
                return array (  '_controller' => 'QuejasBundle\\Controller\\DespachoController::addEditAction',  '_route' => 'quejas_despacho_addedit',);
            }

            if (0 === strpos($pathinfo, '/despacho/planteamiento/list')) {
                // quejas_despacho_listplanteamiento
                if ($pathinfo === '/despacho/planteamiento/list') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\DespachoController::listPlanteamientoAction',  '_route' => 'quejas_despacho_listplanteamiento',);
                }

                // quejas_despacho_listacuerdos
                if ($pathinfo === '/despacho/planteamiento/list') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\DespachoController::listAcuerdosAction',  '_route' => 'quejas_despacho_listacuerdos',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/quejas')) {
            if (0 === strpos($pathinfo, '/quejas/entrevista')) {
                // quejas_entrevista_list
                if ($pathinfo === '/quejas/entrevista/list') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\EntrevistaController::listAction',  '_route' => 'quejas_entrevista_list',);
                }

                // quejas_entrevista_addedit
                if ($pathinfo === '/quejas/entrevista/add-edit') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\EntrevistaController::addEditAction',  '_route' => 'quejas_entrevista_addedit',);
                }

                // quejas_entrevista_remove
                if ($pathinfo === '/quejas/entrevista/remove') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\EntrevistaController::removeAction',  '_route' => 'quejas_entrevista_remove',);
                }

            }

            // quejas_quejas_list
            if ($pathinfo === '/quejas/list') {
                return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::listAction',  '_route' => 'quejas_quejas_list',);
            }

            // quejas_quejas_respuestalist
            if ($pathinfo === '/quejas/respuesta/list') {
                return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::respuestaListAction',  '_route' => 'quejas_quejas_respuestalist',);
            }

            // quejas_quejas_addedit
            if ($pathinfo === '/quejas/add-edit') {
                return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::addEditAction',  '_route' => 'quejas_quejas_addedit',);
            }

            if (0 === strpos($pathinfo, '/quejas/re')) {
                // quejas_quejas_remove
                if ($pathinfo === '/quejas/remove') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::removeAction',  '_route' => 'quejas_quejas_remove',);
                }

                if (0 === strpos($pathinfo, '/quejas/respuesta')) {
                    // quejas_quejas_respuestaaddedit
                    if ($pathinfo === '/quejas/respuesta/add-edit') {
                        return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::respuestaAddEditAction',  '_route' => 'quejas_quejas_respuestaaddedit',);
                    }

                    // quejas_quejas_respuestaestado
                    if ($pathinfo === '/quejas/respuesta/estado') {
                        return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::respuestaEstadoAction',  '_route' => 'quejas_quejas_respuestaestado',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/quejas/acciones')) {
                // quejas_quejas_listacciones
                if ($pathinfo === '/quejas/acciones/list') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::listAccionesAction',  '_route' => 'quejas_quejas_listacciones',);
                }

                // quejas_quejas_addeditacciones
                if ($pathinfo === '/quejas/acciones/add-edit') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::addEditAccionesAction',  '_route' => 'quejas_quejas_addeditacciones',);
                }

                // quejas_quejas_removeaccion
                if ($pathinfo === '/quejas/acciones/remove') {
                    return array (  '_controller' => 'QuejasBundle\\Controller\\QuejasController::removeAccionAction',  '_route' => 'quejas_quejas_removeaccion',);
                }

            }

        }

        // quejas_reportes_entrevista
        if ($pathinfo === '/reporte/quejas/entrevista') {
            return array (  '_controller' => 'QuejasBundle\\Controller\\ReportesController::entrevistaAction',  '_route' => 'quejas_reportes_entrevista',);
        }

        if (0 === strpos($pathinfo, '/nomenclador')) {
            if (0 === strpos($pathinfo, '/nomenclador/c')) {
                if (0 === strpos($pathinfo, '/nomenclador/clasificacion')) {
                    // nomenclador_clasificacion_list
                    if ($pathinfo === '/nomenclador/clasificacion/list') {
                        return array (  '_controller' => 'NomencladorBundle\\Controller\\ClasificacionController::listAction',  '_route' => 'nomenclador_clasificacion_list',);
                    }

                    // nomenclador_clasificacion_addedit
                    if ($pathinfo === '/nomenclador/clasificacion/add-edit') {
                        return array (  '_controller' => 'NomencladorBundle\\Controller\\ClasificacionController::addEditAction',  '_route' => 'nomenclador_clasificacion_addedit',);
                    }

                    // nomenclador_clasificacion_remove
                    if ($pathinfo === '/nomenclador/clasificacion/remove') {
                        return array (  '_controller' => 'NomencladorBundle\\Controller\\ClasificacionController::removeAction',  '_route' => 'nomenclador_clasificacion_remove',);
                    }

                }

                if (0 === strpos($pathinfo, '/nomenclador/conformidad')) {
                    // nomenclador_conformidad_list
                    if ($pathinfo === '/nomenclador/conformidad/list') {
                        return array (  '_controller' => 'NomencladorBundle\\Controller\\ConformidadController::listAction',  '_route' => 'nomenclador_conformidad_list',);
                    }

                    // nomenclador_conformidad_addedit
                    if ($pathinfo === '/nomenclador/conformidad/add-edit') {
                        return array (  '_controller' => 'NomencladorBundle\\Controller\\ConformidadController::addEditAction',  '_route' => 'nomenclador_conformidad_addedit',);
                    }

                    // nomenclador_conformidad_remove
                    if ($pathinfo === '/nomenclador/conformidad/remove') {
                        return array (  '_controller' => 'NomencladorBundle\\Controller\\ConformidadController::removeAction',  '_route' => 'nomenclador_conformidad_remove',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/nomenclador/departamento')) {
                // nomenclador_departamento_list
                if ($pathinfo === '/nomenclador/departamento/list') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\DepartamentoController::listAction',  '_route' => 'nomenclador_departamento_list',);
                }

                // nomenclador_departamento_addedit
                if ($pathinfo === '/nomenclador/departamento/add-edit') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\DepartamentoController::addEditAction',  '_route' => 'nomenclador_departamento_addedit',);
                }

                // nomenclador_departamento_remove
                if ($pathinfo === '/nomenclador/departamento/remove') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\DepartamentoController::removeAction',  '_route' => 'nomenclador_departamento_remove',);
                }

            }

            if (0 === strpos($pathinfo, '/nomenclador/empresa')) {
                // nomenclador_empresa_list
                if ($pathinfo === '/nomenclador/empresa/list') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\EmpresaController::listAction',  '_route' => 'nomenclador_empresa_list',);
                }

                // nomenclador_empresa_addedit
                if ($pathinfo === '/nomenclador/empresa/add-edit') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\EmpresaController::addEditAction',  '_route' => 'nomenclador_empresa_addedit',);
                }

                // nomenclador_empresa_remove
                if ($pathinfo === '/nomenclador/empresa/remove') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\EmpresaController::removeAction',  '_route' => 'nomenclador_empresa_remove',);
                }

            }

            if (0 === strpos($pathinfo, '/nomenclador/municipio')) {
                // nomenclador_municipio_list
                if ($pathinfo === '/nomenclador/municipio/list') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\MunicipioController::listAction',  '_route' => 'nomenclador_municipio_list',);
                }

                // nomenclador_municipio_addedit
                if ($pathinfo === '/nomenclador/municipio/add-edit') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\MunicipioController::addEditAction',  '_route' => 'nomenclador_municipio_addedit',);
                }

                // nomenclador_municipio_remove
                if ($pathinfo === '/nomenclador/municipio/remove') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\MunicipioController::removeAction',  '_route' => 'nomenclador_municipio_remove',);
                }

            }

            if (0 === strpos($pathinfo, '/nomenclador/provincia')) {
                // nomenclador_provincia_list
                if ($pathinfo === '/nomenclador/provincia/list') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\ProvinciaController::listAction',  '_route' => 'nomenclador_provincia_list',);
                }

                // nomenclador_provincia_addedit
                if ($pathinfo === '/nomenclador/provincia/add-edit') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\ProvinciaController::addEditAction',  '_route' => 'nomenclador_provincia_addedit',);
                }

                // nomenclador_provincia_remove
                if ($pathinfo === '/nomenclador/provincia/remove') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\ProvinciaController::removeAction',  '_route' => 'nomenclador_provincia_remove',);
                }

            }

            if (0 === strpos($pathinfo, '/nomenclador/quejas_tipo')) {
                // nomenclador_quejastipo_list
                if ($pathinfo === '/nomenclador/quejas_tipo/list') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\QuejasTipoController::listAction',  '_route' => 'nomenclador_quejastipo_list',);
                }

                // nomenclador_quejastipo_addedit
                if ($pathinfo === '/nomenclador/quejas_tipo/add-edit') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\QuejasTipoController::addEditAction',  '_route' => 'nomenclador_quejastipo_addedit',);
                }

                // nomenclador_quejastipo_remove
                if ($pathinfo === '/nomenclador/quejas_tipo/remove') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\QuejasTipoController::removeAction',  '_route' => 'nomenclador_quejastipo_remove',);
                }

            }

            if (0 === strpos($pathinfo, '/nomenclador/trabajador')) {
                // nomenclador_trabajador_list
                if ($pathinfo === '/nomenclador/trabajador/list') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\TrabajadorController::listAction',  '_route' => 'nomenclador_trabajador_list',);
                }

                // nomenclador_trabajador_addedit
                if ($pathinfo === '/nomenclador/trabajador/add-edit') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\TrabajadorController::addEditAction',  '_route' => 'nomenclador_trabajador_addedit',);
                }

                // nomenclador_trabajador_remove
                if ($pathinfo === '/nomenclador/trabajador/remove') {
                    return array (  '_controller' => 'NomencladorBundle\\Controller\\TrabajadorController::removeAction',  '_route' => 'nomenclador_trabajador_remove',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // _admin
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_admin');
                }

                return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::indexAction',  '_route' => '_admin',);
            }

            // admin_admin_listrole
            if ($pathinfo === '/admin/roles/list') {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::listRoleAction',  '_route' => 'admin_admin_listrole',);
            }

            // admin_admin_listusers
            if ($pathinfo === '/admin/users/list') {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::listUsersAction',  '_route' => 'admin_admin_listusers',);
            }

            // admin_admin_listroleusers
            if ($pathinfo === '/admin/roles/list_roles_users') {
                return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::listRoleUsersAction',  '_route' => 'admin_admin_listroleusers',);
            }

            if (0 === strpos($pathinfo, '/admin/users')) {
                // admin_admin_loadnewusers
                if ($pathinfo === '/admin/users/add') {
                    return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::loadNewUsersAction',  '_route' => 'admin_admin_loadnewusers',);
                }

                // admin_admin_editusers
                if ($pathinfo === '/admin/users/edit_users') {
                    return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::editUsersAction',  '_route' => 'admin_admin_editusers',);
                }

                // admin_admin_addrolesusers
                if ($pathinfo === '/admin/users/add_roles_users') {
                    return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::addRolesUsersAction',  '_route' => 'admin_admin_addrolesusers',);
                }

                // admin_admin_remove
                if ($pathinfo === '/admin/users/remove') {
                    return array (  '_controller' => 'AdminBundle\\Controller\\AdminController::removeAction',  '_route' => 'admin_admin_remove',);
                }

            }

        }

        // admin_default_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'admin_default_index');
            }

            return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'admin_default_index',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // _login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'AdminBundle\\Controller\\SecuredController::loginAction',  '_route' => '_login',);
                }

                // _security_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'AdminBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                }

            }

            // _logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'AdminBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_logout',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
