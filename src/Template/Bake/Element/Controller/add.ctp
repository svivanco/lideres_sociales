<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$compact = ["'" . $singularName . "'"];
%>

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $<%= $singularName %> = $this-><%= $currentModelName %>->newEntity();
        if ($this->request->is('post')) {
            $<%= $singularName %> = $this-><%= $currentModelName %>->patchEntity($<%= $singularName %>, $this->request->getData());
            if ($this-><%= $currentModelName; %>->save($<%= $singularName %>)) 
            {
               
                $this->Flash->flash('Registro guardado.', ['params'=>['type'=>'info']]);

                return $this->redirect(['action' => 'index']);
            }
			 	$this->Flash->flash('El Registro no pudo ser guardado.', ['params'=>['type'=>'danger']]);
		
        }
<%
        $associations = array_merge(
            $this->Bake->aliasExtractor($modelObj, 'BelongsTo'),
            $this->Bake->aliasExtractor($modelObj, 'BelongsToMany')
        );
        foreach ($associations as $assoc):
            $association = $modelObj->association($assoc);
            $otherName = $association->getTarget()->getAlias();
            $otherPlural = $this->_variableName($otherName);
%>
        $<%= $otherPlural %> = $this-><%= $currentModelName %>-><%= $otherName %>->find('list', ['limit' => 200]);
<%
            $compact[] = "'$otherPlural'";
        endforeach;
%>
        $this->set(compact(<%= join(', ', $compact) %>));
        $this->set('_serialize', ['<%=$singularName%>']);
    }
