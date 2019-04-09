
Ext.define('VIV.view.nomenclador.trabajador.TrabajadorGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-trabajador',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    /* Store */
    store: Ext.create('VIV.store.TrabajadorStore'),
    /* Columns */
    columns: [{"xtype":"rownumberer","text":"No","width":45,"align":"center"},{"text":"Id","dataIndex":"id","flex":2,"hidden":true},{"text":"Nombre Apellidos","dataIndex":"nombre_apellidos","flex":7,"hidden":false},{"text":"Trabajador Cargo Id","dataIndex":"trabajador_cargo_id","flex":2,"hidden":true},{"text":"Departamento Id","dataIndex":"departamento_id","flex":2,"hidden":true}],
    /* TollBar */
    tbar : [{
        text: 'Adicionar',
        tooltip: 'Adicionar trabajador',
        iconCls: 'fa fa-plus',
        action: 'add'
    },{
        text: 'Eliminar',
        tooltip: 'Eliminar trabajador',
        iconCls: 'fa fa-trash',
        action: 'remove'
    }, '->', {
        tooltip: 'Ayuda relacionada con trabajador',
        iconCls: 'fa fa-info',
        action: 'help'
    }]
});