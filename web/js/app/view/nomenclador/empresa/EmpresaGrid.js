
Ext.define('VIV.view.nomenclador.empresa.EmpresaGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-empresa',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    /* Store */
    store: Ext.create('VIV.store.EmpresaStore'),
    /* Columns */
    columns: [{"xtype":"rownumberer","text":"No","width":45,"align":"center"},{"text":"Id","dataIndex":"id","flex":2,"hidden":true},{"text":"Nombre","dataIndex":"nombre","flex":3,"hidden":false},{"text":"Codigo","dataIndex":"codigo","flex":3,"hidden":false},{"text":"Telefonos","dataIndex":"telefonos","flex":4,"hidden":false},{"text":"Calle","dataIndex":"calle","flex":3,"hidden":false},{"text":"Entre","dataIndex":"entre","flex":3,"hidden":false},{"text":"Numero","dataIndex":"numero","flex":2,"hidden":false}],
    /* TollBar */
    tbar : [{
        text: 'Adicionar',
        tooltip: 'Adicionar empresa',
        iconCls: 'fa fa-plus',
        action: 'add'
    },{
        text: 'Eliminar',
        tooltip: 'Eliminar empresa',
        iconCls: 'fa fa-trash',
        action: 'remove'
    }, '->', {
        tooltip: 'Ayuda relacionada con empresa',
        iconCls: 'fa fa-info',
        action: 'help'
    }]
});