
Ext.define('VIV.controller.quejas.ViewportEntrevistaController', {
    extend: 'Ext.app.Controller',

    control: {
        '#menu-clientes': { click: "clientesMenuClick" },
        '#menu-entrevistas': { click: "entrevistasMenuClick" },
        '#entrevista-toolbar': { click: "entrevistaToolbarClick" },
        '#menu-entrevista-add': { click: "entrevistaToolbarClick" },
        '#menu-quejas': { click: "quejasMenuClick" },
        '#menu-quejas-rechazada': { click: "quejasRechazadaMenuClick" },
        //'#entrevista-toolbar': { click: "entrevistaToolbarClick" },
        //'#queja-toolbar': { click: "quejaToolbarClick" }
    },
    clientesMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.quejas.cliente.ClienteGrid'), 'fa fa-user-secret');
    },
    entrevistasMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.quejas.entrevista.EntrevistaGrid'), 'fa fa-list-ul');
    },
    entrevistaToolbarClick: function () {
        Ext.create('VIV.view.quejas.entrevista.EntrevistaForm', { actionBtn: 'salvar' }).show();
    },
    quejasMenuClick: function () {
        var store = Ext.create('VIV.store.QuejasStore');
        this.addComponent(Ext.create('VIV.view.quejas.quejas.QuejasGrid', {
            quejasStore: store.load({ params:{ estado: false, rechazada: Ext.encode(false) }})
        }), 'fa fa-users');
    },
     quejasRechazadaMenuClick: function () {
         var store = Ext.create('VIV.store.QuejasStore');
         this.addComponent(Ext.create('VIV.view.quejas.quejas.QuejasGrid', {
             quejasStore: store.load({ params:{ estado: false, rechazada: Ext.encode(true) }})
         }), 'fa fa-users');
    },

    addComponent: function (component, title, iconCls) {
        var center_panel = Ext.getCmp('center-panel-id');
        center_panel.removeAll();
        center_panel.add({
            iconCls: iconCls,
            items: component
        });
    }
});