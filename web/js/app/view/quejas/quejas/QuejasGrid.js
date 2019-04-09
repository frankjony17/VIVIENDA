
Ext.define('VIV.view.quejas.quejas.QuejasGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-quejas',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',

    plugins: [{
        ptype: 'rowexpander',
        rowBodyTpl: ['{respuesta-data}']
    },{
        ptype: 'cellediting',
        clicksToEdit: 1
    }],
    features: [{
        groupHeaderTpl: 'Fecha: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }],
    viewConfig: {
        getRowClass: function(record) {
            if(record.get('estado') === true) {
                return 'queja-color';
            }
        }
    },
    /* Columns */
    columns: [
        {"xtype":"rownumberer","text":"No","width":45,"align":"center"},
        {"text":"Id","dataIndex":"id","flex":1,"hidden":true},
        {"text":"Fecha","dataIndex":"fecha","flex":1,"hidden":true},
        {"text":"Fecha culminación","dataIndex":"fecha_culminacion","flex":4,"hidden":false},
        {"text":"Cliente","dataIndex":"cliente","flex":10,"hidden":false},
        {
            text: "Estado",
            align: 'center',
            xtype: 'checkcolumn',
            dataIndex: "estado",
            flex: 1,
            editor: {
                xtype: 'checkbox'
            }
        },
        {"text":"Entrevista Id","dataIndex":"entrevista_id","hidden":true},
        {"text":"Quejas Tipo Id","dataIndex":"quejas_tipo_id","hidden":true},
        {"text":"respuesta-id","dataIndex":"respuesta-id","hidden":true},
        {"text":"respuesta-respuesta","dataIndex":"respuesta-respuesta","hidden":true},
        {"text":"respuesta-observacion","dataIndex":"respuesta-observacion","hidden":true},
        {"text":"respuesta-data","dataIndex":"respuesta-data","hidden":true}
    ],
    initComponent: function () {
        this.store = this.quejasStore;
        this.callParent(arguments);
    }
});