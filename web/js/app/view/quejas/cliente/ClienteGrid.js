
Ext.define('VIV.view.quejas.cliente.ClienteGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-cliente',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    /* Store */
    store: Ext.create('VIV.store.ClienteStore'),
    /* Columns */
    columns: [{"xtype":"rownumberer","text":"No","width":45,"align":"center"},{"text":"Id","dataIndex":"id","flex":2,"hidden":true},{"text":"Ci","dataIndex":"ci","flex":1,"hidden":false},{"text":"Nombre Apellidos","dataIndex":"nombre_apellidos","flex":7,"hidden":false},{"text":"Calle","dataIndex":"calle","flex":3,"hidden":false},{"text":"Entre","dataIndex":"entre","flex":3,"hidden":false},{"text":"Apartamento","dataIndex":"apartamento","flex":2,"hidden":false},{"text":"Edificio","dataIndex":"edificio","flex":2,"hidden":false},{"text":"Casa","dataIndex":"casa","flex":2,"hidden":false},{"text":"Telefonos","dataIndex":"telefonos","flex":4,"hidden":false},{"text":"Correo","dataIndex":"correo","flex":7,"hidden":false},{"text":"Empresa Id","dataIndex":"empresa_id","flex":2,"hidden":true},{"text":"Municipio Id","dataIndex":"municipio_id","flex":2,"hidden":true}],
    /* TollBar */
    tbar : [{
        text: 'Adicionar',
        tooltip: 'Adicionar cliente',
        iconCls: 'fa fa-plus',
        action: 'add'
    },{
        text: 'Eliminar',
        tooltip: 'Eliminar cliente',
        iconCls: 'fa fa-trash',
        action: 'remove'
    }, '->', {
        tooltip: 'Ayuda relacionada con cliente',
        iconCls: 'fa fa-info',
        action: 'help'
    }]
});