
Ext.define('VIV.view.nomenclador.provincia.ProvinciaGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-provincia',
    /* Config options */
    width: '100%',
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    /* Store */
    store: Ext.create('VIV.store.ProvinciaStore'),
    /* Columns */
    columns: [{"xtype":"rownumberer","text":"No","width":45,"align":"center"},{"text":"Id","dataIndex":"id","flex":2,"hidden":true},{"text":"Nombre","dataIndex":"nombre","flex":3,"hidden":false},{"text":"Descripcion","dataIndex":"descripcion","flex":7,"hidden":false}],
    /* TollBar */
    tbar : [{
        text: 'Adicionar',
        tooltip: 'Adicionar provincia',
        iconCls: 'fa fa-plus',
        action: 'add'
    },{
        text: 'Eliminar',
        tooltip: 'Eliminar provincia',
        iconCls: 'fa fa-trash',
        action: 'remove'
    }, '->', {
        tooltip: 'Ayuda relacionada con provincia',
        iconCls: 'fa fa-info',
        action: 'help'
    }]
});