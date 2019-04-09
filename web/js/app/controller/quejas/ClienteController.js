
Ext.define('VIV.controller.quejas.ClienteController', {
    extend: 'Ext.app.Controller',

    control: {
        /* Grid */
        'grid-cliente': {
            afterrender: "afterRenderGrid",
            celldblclick: "dblclick",
            resize: "resize"
        },
        '#menu-clientes-add': {
            click: "showWindows"
        },
        'grid-cliente [text=Eliminar]': {
            click: "confirmRemove"
        },
        /* Form */
        'form-cliente': {
            afterrender: "afterRenderForm"
        },
        'form-cliente [text=Salvar]': {
            click: "isValid"
        },
        'form-cliente [text=Editar]': {
            click: "isValid"
        }
    },
    resize: function (grid){
        var centerpanel = Ext.getCmp('center-panel-id');
        grid.setHeight(centerpanel.getHeight());
    },
    afterRenderGrid: function (grid) {
        this.grid = grid;
        this.store = grid.getStore();
    },
    afterRenderForm: function (win) {
        this.win = win;
        this.form = win.down('form');
    },
    /* ADD-EDIT-CLIENTES */
    isValid: function () {
        if (this.form.getForm().isValid()) {
            this.submitClick();
        } else {
            this.message('Atención?', '<b><span style="color:red;">Formulario no válido</span></b>, verifique las casillas en <b><span style="color:red;">rojo</span></b>.', Ext.Msg.QUESTION);
        }
    },
    /* WIN-ADD */
    showWindows: function () {
        Ext.create('VIV.view.quejas.cliente.ClienteForm', { autoShow: true, btnText: 'Salvar', title: 'Adicionar Cliente' });
    },
    /* WIN-EDIT */
    dblclick: function (view, td, cellIndex, record, tr, rowIndex) {
        var win = Ext.create('VIV.view.quejas.cliente.ClienteForm',{ btnText: 'Editar', title: 'Editar Cliente' }),
            form = win.down('form');
        form.loadRecord(record);
        win.show();
    },
    submitClick: function () {
        var me = this;
        this.form.submit({
            success: function() {
                me.form.up('window').close();
                me.store.reload();
                Ext.toast('Operación realizada exitosamente.', 'Operación OK');
            },
            failure: function(form, action) {
                if (action.response.responseText === 'unique') {
                    me.message('Atención', 'El <b>CI</b> ya existe, <b>Verifiquelo!!!</b>', Ext.Msg.INFO);
                } else {
                    me.message('Error?', action.response.responseText, Ext.Msg.ERROR);
                }
            }
        });
    },
    /* REMOVE */
    confirmRemove: function () {
        if (this.grid.selModel.getCount() >= 1) {
            Ext.MessageBox.confirm('Confirmación', 'Desea eliminar los registro seleccionado?', confirm, this);
        } else {
            this.message('Atención', 'Seleccione el o los registro que desea eliminar.', Ext.Msg.QUESTION);
        }

        function confirm (btn) {
            if (btn === 'yes') {
                this.remove();
            }
        }
    },
    remove: function () {
        var me = this, ids = [];

        Ext.Array.each(this.grid.selModel.getSelection(), function (row) {
            ids.push(row.get('id'));
        });
        Ext.Ajax.request({
            url: '../quejas/cliente/remove',
            params: { ids:  Ext.encode(ids) },
            success: function(response) {
                if (response.responseText === '') {
                    me.store.load();
                } else {
                    me.message('Error', response.responseText, Ext.Msg.ERROR);
                }
            },
            failure: function(response){
                me.message('Error', response.responseText, Ext.Msg.ERROR);
            }
        });
    },
    /* SHOW-MESSAGE */
    message: function (title, message, icon) {
        Ext.Msg.show({ title: title, message: message, buttons:Ext.MessageBox.OK, icon: icon });
    },
});