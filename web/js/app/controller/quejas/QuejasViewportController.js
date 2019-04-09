
Ext.define('VIV.controller.quejas.QuejasViewportController', {
    extend: 'Ext.app.Controller',

    control: {
        '#admin-logout': {
            click: "logout"
        },
        '#menu-quejas': { click: "quejasMenuClick" },
        '#menu-respuestas': { click: "respuestasMenuClick" },
        '#menu-acciones-add': { click: "accionesAddClick" },
        '#respuestas-toolbar': { click: "respuestasToolbarClick" }
    },
    /* Logout */
    logout: function () {
        location.href = '../../app.php/logout';
    },
    quejasMenuClick: function () {
        var store = Ext.create('VIV.store.QuejasStore');
        this.addComponent(Ext.create('VIV.view.quejas.quejas.QuejasGrid', {
            quejasStore: store.load({ params:{ rechazada: Ext.encode('ALL') }})
        }));
    },
    respuestasMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.quejas.respuesta.RespuestaGrid'));
    },
    accionesAddClick: function () {
        //this.addComponent(Ext.create('VIV.view.quejas.entrevista.EntrevistaGrid'));
    },
    respuestasToolbarClick: function () {
        //Ext.create('VIV.view.quejas.entrevista.EntrevistaForm', { actionBtn: 'salvar' }).show();
    },

    addComponent: function (component) {
        var center_panel = Ext.getCmp('center-panel-id');
        center_panel.removeAll();
        center_panel.add({
            items: component
        });
    }
});