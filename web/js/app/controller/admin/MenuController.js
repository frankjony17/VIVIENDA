
Ext.define('VIV.controller.admin.MenuController', {
    extend: 'Ext.app.Controller',

    control: {
        '#tree-roles': { click: "rolesMenuClick" },
        '#tree-usuarios': { click: "usersMenuClick" },
        '#usuarios-toolbar': { click: "usersMenuClick" },
        '#item-provincia': { click: "provinciaMenuClick" },
        '#item-municipio': { click: "municipioMenuClick" },
        '#item-empresa': { click: "empresaMenuClick" },
        '#item-departamento': { click: "departamentoMenuClick" },
        '#item-cargo': { click: "cargoMenuClick" },
        '#item-trabajador': { click: "trabajadorMenuClick" },
        '#item-clasificacion': { click: "clasificacionMenuClick" },
        '#item-conformidad': { click: "conformidadMenuClick" },
        '#item-quejas': { click: "quejasMenuClick" }
    },
    provinciaMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.provincia.ProvinciaGrid'), 'Provincia', 'fa fa-map');
    },
    municipioMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.municipio.MunicipioGrid'), 'Roles', 'fa fa-credit-card');
    },
    empresaMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.empresa.EmpresaGrid'), 'Empresa', 'fa fa-map');
    },
    departamentoMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.departamento.DepartamentoGrid'), 'Departamento', 'fa fa-users');
    },
    cargoMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.trabajador_cargo.TrabajadorCargoGrid'), 'Cargo', 'fa fa-credit-card');
    },
    trabajadorMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.trabajador.TrabajadorGrid'), 'Trabajador', 'fa fa-map');
    },
    clasificacionMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.clasificacion.ClasificacionGrid'), 'Clasificación', 'fa fa-users');
    },
    conformidadMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.conformidad.ConformidadGrid'), 'Conformidad', 'fa fa-credit-card');
    },
    quejasMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.nomenclador.quejas_tipo.QuejasTipoGrid'), 'Quejas', 'fa fa-map');
    },
    usersMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.admin.users.UsersGrid'), 'Usuarios', 'fa fa-users');
    },
    rolesMenuClick: function () {
        this.addComponent(Ext.create('VIV.view.admin.roles.RolesGrid'), 'Roles', 'fa fa-credit-card');
    },

    addComponent: function (component, title, iconCls) {
        var center_panel = Ext.getCmp('center-panel-id');

        center_panel.removeAll();

        center_panel.add({
            title: "Gestionar "+ title,
            iconCls: iconCls,
            closable: true,
            items: component
        });
    }
});