
Ext.define('VIV.view.admin.NomencladorMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'menu-nomenclador',

    defaults: {
        padding: 5
    },
    width: 250,
    closeAction : 'destroy',
    
    items: [{
        text: '<b>Provincia</b>',
        iconCls: 'provincia',
        id: 'item-provincia'
    },{
        text: '<b>Municipio</b>',
        iconCls: 'municipio',
        id: 'item-municipio'
    },{
        text: '<b>Empresa</b>',
        iconCls: 'empresa',
        id: 'item-empresa'
    },{
        text: '<b>Departamento</b>',
        iconCls: 'departamento',
        id: 'item-departamento'
    },{
        text: '<b>Cargo</b>',
        iconCls: 'cargo',
        id: 'item-cargo'
    },{
        text: '<b>Trabajador</b>',
        iconCls: 'trabajador',
        id: 'item-trabajador'
    },{
        text: '<b>Entrevista [<span style="color: green">Clasificación</span>]</b>',
        iconCls: 'clasificacion',
        id: 'item-clasificacion'
    },{
        text: '<b>Entrevista [<span style="color: green">Conformidad</span>]</b>',
        iconCls: 'conformidad',
        id: 'item-conformidad'
    },{
        text: '<b>Quejas [<span style="color: red">Tipo</span>]</b>',
        iconCls: 'quejas',
        id: 'item-quejas'
    }]
});