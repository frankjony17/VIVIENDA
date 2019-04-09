
Ext.define('VIV.controller.quejas.ViewportEntrevistaController', {
    extend: 'Ext.app.Controller',

    control: {
        '#menu-clientes': { click: "clientesMenuClick" },
        '#menu-entrevistas': { click: "entrevistasMenuClick" },
        //'#menu-quejas': { click: "quejasMenuClick" },
        //'#menu-quejas-rechazadas': { click: "quejasRechazadasMenuClick" },
        //'#entrevista-toolbar': { click: "entrevistaToolbarClick" },
        //'#queja-toolbar': { click: "quejaToolbarClick" }
    },
    clientesMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.quejas.cliente.ClienteGrid'), 'Listado de clientes', 'fa fa-user-secret');
    },
    entrevistasMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.quejas.entrevista.EntrevistaGrid'), 'Listado de entrevista', 'fa fa-list-ul');
    },
    //quejasMenuClick: function () {
    //    this.addComponent(Ext.create('VIV.view.nomenclador.empresa.EmpresaGrid'), 'Empresa', 'fa fa-map');
    //},
    //quejasRechazadasMenuClick: function () {
    //    this.addComponent(Ext.create('VIV.view.nomenclador.departamento.DepartamentoGrid'), 'Departamento', 'fa fa-users');
    //},
    //entrevistaToolbarClick: function () {
    //    this.addComponent(Ext.create('VIV.view.nomenclador.trabajador_cargo.TrabajadorCargoGrid'), 'Cargo', 'fa fa-credit-card');
    //},
    //quejaToolbarClick: function () {
    //    this.addComponent(Ext.create('VIV.view.nomenclador.trabajador.TrabajadorGrid'), 'Trabajador', 'fa fa-map');
    //},

    addComponent: function (component, title, iconCls) {
        var center_panel = Ext.getCmp('center-panel-id');

        center_panel.removeAll();

        center_panel.add({
            title: title,
            iconCls: iconCls,
            closable: true,
            items: component
        });
    }
});