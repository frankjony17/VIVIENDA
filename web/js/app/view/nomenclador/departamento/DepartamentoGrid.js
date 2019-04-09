
Ext.define('VIV.view.nomenclador.departamento.DepartamentoGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-departamento',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    /* Store */
    store: Ext.create('VIV.store.DepartamentoStore'),
    /* Columns */
    columns: [{"xtype":"rownumberer","text":"No","width":45,"align":"center"},{"text":"Id","dataIndex":"id","flex":2,"hidden":true},{"text":"Nombre","dataIndex":"nombre","flex":3,"hidden":false},{"text":"Telefonos","dataIndex":"telefonos","flex":4,"hidden":false},{"text":"Descripcion","dataIndex":"descripcion","flex":7,"hidden":false}],
    /* TollBar */
    tbar : [{
        text: 'Adicionar',
        tooltip: 'Adicionar departamento',
        iconCls: 'fa fa-plus',
        action: 'add'
    },{
        text: 'Eliminar',
        tooltip: 'Eliminar departamento',
        iconCls: 'fa fa-trash',
        action: 'remove'
    }, '->', {
        tooltip: 'Ayuda relacionada con departamento',
        iconCls: 'fa fa-info',
        action: 'help'
    }]
});