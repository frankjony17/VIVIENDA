
Ext.define('VIV.view.nomenclador.trabajador.TrabajadorForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-trabajador',

    iconCls: '',
    layout: 'fit',
    width: 640,
    resizable: false,
    modal: true,

    initComponent: function () {
        var me = this;

        this.items = [{
            xtype: 'form',
            url: '../nomenclador/trabajador/add-edit',
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
                    xtype: 'textfield',
                    fieldLabel: 'Nombre Apellidos',
                    emptyText: 'Nombre Apellidos',
                    name: 'nombre_apellidos',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 126,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>'],
                    margin: '0 5 0 0'
                },{
                    xtype: 'combobox',
                    fieldLabel: 'Trabajador Cargo',
                    emptyText: 'Trabajador Cargo',
                    name: 'trabajador_cargo_id',
                    store: Ext.create('VIV.store.TrabajadorCargoStore'),
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
                layout: 'anchor',
                items: [{
                    xtype: 'combobox',
                    fieldLabel: 'Departamento',
                    emptyText: 'Departamento',
                    name: 'departamento_id',
                    store: Ext.create('VIV.store.DepartamentoStore'),
                    queryMode: 'local',
                    displayField: 'nombre',
                    valueField: 'id',
                    editable: false,
                    flex: 1,
                    allowBlank: false,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
                }, {
                    xtype: 'hiddenfield',
                    name: 'id'
                }]
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