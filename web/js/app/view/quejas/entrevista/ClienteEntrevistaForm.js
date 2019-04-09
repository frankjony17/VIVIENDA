
Ext.define('VIV.view.quejas.entrevista.ClienteEntrevistaForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-entrevista',

    iconCls: '',
    layout: 'fit',
    resizable: false,
    modal: true,

    initComponent: function () {
        var me = this;

        this.items = [{
            xtype: 'form',
            url: '../quejas/entrevista/add-edit',
            padding: '10 10 10 10',
            frame: false,
            fieldDefaults: {
                anchor: '100%',
                allowBlank: false,
                labelAlign: 'top'
            },
            items:[{
                xtype: 'container',
                border: false,
                layout: 'hbox',
                items: [{
                    xtype: 'datefield',
                    fieldLabel: 'Fecha',
                    name: 'fecha',
                    value: new Date(),
                    format: 'Y-m-d',
                    editable: false,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'textfield',
                    fieldLabel: 'Codigo',
                    emptyText: 'Codigo',
                    name: 'codigo',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 30,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'combobox',
                    fieldLabel: 'Expediente',
                    emptyText: 'Expediente',
                    name: 'expediente',
                    store: Ext.create('Ext.data.ArrayStore', {
                        fields: [ 'estado', 'value' ],
                        data: [[ true, 'Si' ], [ false, 'No' ]]
                    }),
                    queryMode: 'local',
                    displayField: 'value',
                    valueField: 'estado',
                    editable: false,
                    allowBlank: true,
                    flex: 1
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'hbox',
                items: [{
                    xtype: 'textareafield',
                    fieldLabel: 'Sintesis',
                    name: 'sintesis',
                    grow: true,
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: -2,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false,
                    margin: '0 5 0 0'
                },{
                    xtype: 'textareafield',
                    fieldLabel: 'Tramites Realizados',
                    name: 'tramites_realizados',
                    grow: true,
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: -2,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false,
                    margin: '0 5 0 0'
                },{
                    xtype: 'textareafield',
                    fieldLabel: 'Concluciones',
                    name: 'concluciones',
                    grow: true,
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: -2,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'hbox',
                items: [{
                    xtype: 'textareafield',
                    fieldLabel: 'Nivel Solucion',
                    name: 'nivel_solucion',
                    grow: true,
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: -2,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false,
                    margin: '0 5 0 0'
                },{
                    xtype: 'textareafield',
                    fieldLabel: 'Asunto',
                    name: 'asunto',
                    grow: true,
                    /*maskRe: MASKRe,
                     regex: REGEx,*/
                    maxLength: -2,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'hbox',
                items: [{
                    xtype: 'combobox',
                    fieldLabel: 'Cliente',
                    emptyText: 'Cliente',
                    name: 'cliente_id',
                    store: Ext.create('VIV.store.ClienteStore'),
                    queryMode: 'local',
                    displayField: 'ci',
                    valueField: 'id',
                    editable: false,
                    flex: 1,
                    allowBlank: false,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'combobox',
                    fieldLabel: 'Clasificacion',
                    emptyText: 'Clasificacion',
                    name: 'clasificacion_id',
                    store: Ext.create('VIV.store.ClasificacionStore'),
                    queryMode: 'local',
                    displayField: 'nombre',
                    valueField: 'id',
                    editable: false,
                    flex: 1,
                    allowBlank: false,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }]
            },{
                xtype: 'container',
                border: false,
                layout: 'hbox',
                items: [{
                    xtype: 'combobox',
                    fieldLabel: 'Trabajador',
                    emptyText: 'Trabajador',
                    name: 'trabajador_id',
                    store: Ext.create('VIV.store.TrabajadorStore'),
                    queryMode: 'local',
                    displayField: 'nombre_apellidos',
                    valueField: 'id',
                    editable: false,
                    flex: 1,
                    allowBlank: false,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'combobox',
                    fieldLabel: 'Conformidad',
                    emptyText: 'Conformidad',
                    name: 'conformidad_id',
                    store: Ext.create('VIV.store.ConformidadStore'),
                    queryMode: 'local',
                    displayField: 'nombre',
                    valueField: 'id',
                    editable: false,
                    flex: 1,
                    allowBlank: false,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }]
            },{
                xtype: 'hiddenfield',
                name: 'id'
            }]
        }];
        this.buttons = [{
            text: me.btnText,
            iconCls: 'fa fa-check'
        },{
            text: 'Cancelar',
            iconCls: 'fa fa-times',
            handler: function() {
                me.close();
            }
        }];
        this.callParent(arguments);
    }
});