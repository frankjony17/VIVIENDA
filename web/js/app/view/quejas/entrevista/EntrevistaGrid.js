
Ext.define('VIV.view.quejas.entrevista.EntrevistaGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-entrevista',
    /* Config options */
    width: '100%',
    border: true,
    selType: 'checkboxmodel',
    autoScroll: true,
    scrollable: 'vertical',
    store: Ext.create('VIV.store.EntrevistaStore'),
    plugins: [{
        ptype: 'rowexpander',
        rowBodyTpl: ['{data}']
    }],
    features: [{
        groupHeaderTpl: 'Fecha: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }],
    viewConfig: {
        getRowClass: function(record) {
            if(record.get('queja')) {
                return 'queja-color';
            }
        }
    },
    /* Columns */
    columns: [{
        "xtype":"rownumberer","text":"No","width":45,"align":"center"
    },{
        "text":"Id","dataIndex":"id","flex":2,"hidden":true
    },{
        "text":"Fecha","dataIndex":"fecha","flex":1,"hidden":false
    },{
        "text":"Codigo","dataIndex":"codigo","flex":2,"hidden":false
    },{
        text: "Asunto",
        xtype: 'templatecolumn',
        tpl:'<b>({cliente})</b>: {asunto}',
        dataIndex: "asunto",
        flex: 8,
        hidden: false
    },{
        "text":"Síntesis","dataIndex":"sintesis","flex":7,"hidden":true
    },{
        "text":"Tramites Realizados","dataIndex":"tramites_realizados","flex":7,"hidden":true
    },{
        "text":"Concluciones","dataIndex":"concluciones","flex":7,"hidden":true
    },{
        "text":"Nivel Solución","dataIndex":"nivel_solucion","flex":7,"hidden":true
    },{
        "text":"Expediente","dataIndex":"expediente","flex":2,"hidden":true
    },{
        "text":"Cliente Id","dataIndex":"cliente_id","flex":2,"hidden":true
    },{
        "text":"Cliente","dataIndex":"cliente","flex":2,"hidden":true
    },{
        "text":"Clasificacion Id","dataIndex":"clasificacion_id","flex":2,"hidden":true
    },{
        "text":"Trabajador Id","dataIndex":"trabajador_id","flex":2,"hidden":true
    },{
        "text":"Conformidad Id","dataIndex":"conformidad_id","flex":2,"hidden":true
    },{
        "text":"Queja","dataIndex":"queja","flex":1,"hidden":true
    },{
        "text":"72horas","dataIndex":"72horas","flex":1,"hidden":true
    }]
});