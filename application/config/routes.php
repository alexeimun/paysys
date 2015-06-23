<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    #Reserved
    $route['default_controller'] = "home";
    $route['404_override'] = 'home/error404';
    #Validaciones
    $route['ValidaCampos'] = 'validaciones/ValidaCampos';
    #Rutas Usuarios
    $route['usuarios'] = 'usuarios/Usuarios';
    #Perfil usuario
    $route['perfil'] = 'app/Perfil';
    $route['ActualizaAvatarUsuario'] = 'usuario/ActualizaAvatar';
    $route['actualizaUsuarioPerfil'] = 'usuario/ActualizaUsuarioPerfil';
    #Ruta inicio
    $route['inicio'] = 'app';
    ##Rutas Clientes##
    #Deudores
    $route['deudores'] = 'cliente/Deudores';
    $route['verdeudor/(:num)'] = 'cliente/VerDeudor/$1';
    $route['actualizardeudor/(:num)'] = 'cliente/ActualizarDeudor/$1';
    $route['actualizaDeudor'] = 'cliente/ActualizaDeudor';
    $route['eliminarDeudor'] = 'cliente/EliminarDeudor';
    $route['creardeudor'] = 'cliente/CrearDeudor';
    $route['insertaDeudor'] = 'cliente/InsertaDeudor';
    $route['RestaurarDeudor/(:num)'] = 'cliente/RestauraDeudor/$1';
    #Acreedores#
    $route['acreedores'] = 'cliente/Acreedores';
    $route['veracreedor/(:num)'] = 'cliente/VerAcreedor/$1';
    $route['actualizaracreedor/(:num)'] = 'cliente/ActualizarAcreedor/$1';
    $route['actualizaAcreedor'] = 'cliente/ActualizaAcreedor';
    $route['eliminarAcreedor'] = 'cliente/EliminarAcreedor';
    $route['crearacreedor'] = 'cliente/CrearAcreedor';
    $route['insertaAcreedor'] = 'cliente/InsertaAcreedor';
    $route['RestaurarAcreedor/(:num)'] = 'cliente/RestauraAcreedor/$1';
    ##Hipotecas##
    #Solicitudes
    $route['solicitudes'] = 'hipoteca/Solicitudes';
    $route['crearsolicitud'] = 'hipoteca/CrearSolicitud';
    $route['versolicitud/(:num)'] = 'hipoteca/VerSolicitud/$1';
    $route['insertaSolicitud'] = 'hipoteca/InsertaSolicitud';
    $route['eliminarSolicitud'] = 'hipoteca/EliminarSolicitud';
    #Inmuebles
    $route['inmuebles'] = 'hipoteca/Inmuebles';
    $route['crearinmueble'] = 'hipoteca/CrearInmueble';
    $route['insertaInmueble'] = 'hipoteca/InsertaInmueble';
    $route['actualizarinmueble/(:num)'] = 'hipoteca/ActualizarInmueble/$1';
    $route['actualizaInmueble'] = 'hipoteca/ActualizaInmueble';
    $route['eliminarInmueble'] = 'hipoteca/EliminarInmueble';
    $route['verinmueble/(:num)'] = 'hipoteca/VerInmueble/$1';
    $route['traeInmueblesDropdown'] = 'hipoteca/TraeInmueblesDropdown';
    ##Parámetros##
    #Impporte y Exporte de Deudores
    $route['exportardeudores'] = 'parametro/ExportarDeudores';
    $route['exportard'] = 'parametro/ExportaDeudores';
    $route['importardeudores'] = 'parametro/ImportarDeudores';
    $route['importard'] = 'parametro/ImportaDeudores';
    #Impporte y Exporte de Acreedores
    $route['exportaracreedores'] = 'parametro/ExportarAcreedores';
    $route['exportara'] = 'parametro/ExportaAcreedores';
    $route['importaracreedores'] = 'parametro/ImportarAcreedores';
    $route['importara'] = 'parametro/ImportaAcreedores';
    #Empresa
    $route['empresa'] = 'parametro/Empresa';
    $route['actualizaempresa'] = 'parametro/ActualizaEmpresa';
    #Consecutivos
    $route['consecutivos'] = 'parametro/Consecutivos';
    $route['actualizaconsecutivos'] = 'parametro/ActualizaConsecutivos';
    ##Caja##
    #Recibo
    $route['crearrecibo'] = 'caja/CrearRecibo';
    $route['insertaRecibo'] = 'caja/InsertaRecibo';
    $route['pagostemp'] = 'caja/PagosTemporales';
    $route['relaciones'] = 'caja/Clientes';
    $route['ImprimeRecibo'] = 'caja/ImprimeRecibo';
    $route['recibos'] = 'caja/Recibos';
    $route['verrecibo/(:num)'] = 'caja/VerRecibo/$1';
    $route['anularrecibo/(:num)'] = 'caja/AnularRecibo/$1';
    ##Informes##
    #Cuadre diario
    $route['cuadrediario'] = 'caja/CuadreDiario';
    $route['ImprimeCuadreDiario'] = 'caja/ImprimeCuadreDiario';
    #Deudores
    $route['informedeudor'] = 'caja/InformeDeudor';
    $route['ImprimeInformeDeudor'] = 'caja/ImprimeInformeDeudor';
    #Acreedores
    $route['informeacreedor'] = 'caja/InformeAcreedor';
    $route['ImprimeInformeAcreedor'] = 'caja/ImprimeInformeAcreedor';
    #Notificaciones
    $route['notificaciones'] = 'app/Notificaciones';
    $route['vernotificacion/(:any)'] = 'app/VerNotificacion/$1';
    ##Usuarios
    $route['usuarios'] = 'usuario';
    $route['crearusuario'] = 'usuario/CrearUsuario';
    $route['verusuario/(:num)'] = 'usuario/VerUsuario/$1';
    $route['actualizarusuario/(:num)'] = 'usuario/ActualizarUsuario/$1';
    $route['actualizaUsuario'] = 'usuario/ActualizaUsuario';
    $route['insertarUsuario'] = 'usuario/InsertarUsuario';
    $route['eliminarUsuario'] = 'usuario/EliminarUsuario';
    $route['RestaurarUsuario/(:num)'] = 'usuario/RestauraUsuario/$1';
    #Observaciones
    $route['observaciones'] = 'observacion';
    $route['verobservacion/(:num)'] = 'observacion/VerObservacion/$1';
    $route['Procesarobservacion/(:num)'] = 'observacion/ProcesarObservacion/$1'; //Gestionar la notificación
    $route['crearobservacion'] = 'observacion/CrearObservacion';
    $route['insertaObservacion'] = 'observacion/InsertaObservacion';
    $route['crearcomentario'] = 'observacion/CraerComentario';
    $route['vercomentario/(:num)/(:num)'] = 'observacion/VerComentario/$1/$2';
    $route['solucionar'] = 'observacion/SolucionarObservacion';
    $route['adjuntarobservacion'] = 'observacion/AdjuntarObservacion';
    $route['EliminarArchivo'] = 'observacion/EliminarArchivo';
    $route['DescargarArchivo/(:any)/(:any)'] = 'observacion/DescargarArchivo/$1/$2';