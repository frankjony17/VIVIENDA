
Ext.define('VIV.view.quejas.entrevista.EntrevistaGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-entrevista',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    /* Store */
    store: Ext.create('VIV.store.EntrevistaStore'),
    /* Columns */
    columns: [{"xtype":"rownumberer","text":"No","width":45,"align":"center"},{"text":"Id","dataIndex":"id","flex":2,"hidden":true},{"text":"Fecha","dataIndex":"fecha","flex":2,"hidden":false},{"text":"Codigo","dataIndex":"codigo","flex":3,"hidden":false},{"text":"Asunto","dataIndex":"asunto","flex":7,"hidden":false},{"text":"Sintesis","dataIndex":"sintesis","flex":7,"hidden":false},{"text":"Tramites Realizados","dataIndex":"tramites_realizados","flex":7,"hidden":false},{"text":"Concluciones","dataIndex":"concluciones","flex":7,"hidden":false},{"text":"Nivel Solucion","dataIndex":"nivel_solucion","flex":7,"hidden":false},{"text":"Expediente","dataIndex":"expediente","flex":2,"hidden":false},{"text":"Cliente Id","dataIndex":"cliente_id","flex":2,"hidden":true},{"text":"Clasificacion Id","dataIndex":"clasificacion_id","flex":2,"hidden":true},{"text":"Trabajador Id","dataIndex":"trabajador_id","flex":2,"hidden":true},{"text":"Conformidad Id","dataIndex":"conformidad_id","flex":2,"hidden":true}],
    /* TollBar */
    tbar : [{
        text: 'Adicionar',
        tooltip: 'Adicionar entrevista',
        iconCls: 'fa fa-plus',
        action: 'add'
    },{
        text: 'Eliminar',
        tooltip: 'Eliminar entrevista',
        iconCls: 'fa fa-trash',
        action: 'remove'
    }, '->', {
        tooltip: 'Ayuda relacionada con entrevista',
        iconCls: 'fa fa-info',
        action: 'help'
    }]
});