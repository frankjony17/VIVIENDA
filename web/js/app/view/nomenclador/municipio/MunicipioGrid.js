
Ext.define('VIV.view.nomenclador.municipio.MunicipioGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-municipio',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    /* Store */
    store: Ext.create('VIV.store.MunicipioStore'),
    /* Columns */
    columns: [{"xtype":"rownumberer","text":"No","width":45,"align":"center"},{"text":"Id","dataIndex":"id","flex":2,"hidden":true},{"text":"Nombre","dataIndex":"nombre","flex":3,"hidden":false},{"text":"Descripcion","dataIndex":"descripcion","flex":7,"hidden":false},{"text":"Provincia Id","dataIndex":"provincia_id","flex":2,"hidden":true}],
    /* TollBar */
    tbar : [{
        text: 'Adicionar',
        tooltip: 'Adicionar municipio',
        iconCls: 'fa fa-plus',
        action: 'add'
    },{
        text: 'Eliminar',
        tooltip: 'Eliminar municipio',
        iconCls: 'fa fa-trash',
        action: 'remove'
    }, '->', {
        tooltip: 'Ayuda relacionada con municipio',
        iconCls: 'fa fa-info',
        action: 'help'
    }]
});