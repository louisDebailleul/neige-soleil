package controleur;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

	public class Tableau {

		
		/* Creation de la table en utilisant DefaultTableModel */
		public static JTable creationDeLaTable(String []  entetes, Object[][] data){
		 
			return new JTable(new DefaultTableModel(data, entetes));
		}

		/* Ajout d'une ligne (il faut que la table ait un modele DefaultTableModel) */
		public static void ajouterLigne(JTable table, String[] valeurs){
			((DefaultTableModel)(table.getModel())).addRow(valeurs);
		}

		/* Ajout d'une colonne (il faut que la table ait un modele DefaultTableModel) */
		public static void ajouterColonne(JTable table, String valeur){
			((DefaultTableModel)(table.getModel())).addColumn(valeur);
		}

		/* Suppression d'une ligne (il faut que la table ait un modele DefaultTableModel) */
		public static void supprimerLigne(JTable table, int indice){
			((DefaultTableModel)(table.getModel())).removeRow(indice);
		}

		/* Suppression d'une colonne*/
		public static void suppriemerColonnne(JTable table, int i){		 
			table.removeColumn(table.getColumnModel().getColumn(i));
		}
		public static  int rechercher(JTable uneTable, String text) {
			  
			 
			int i = 0;
			 for (i=0; i<uneTable.getRowCount();i++)
			 {
				 if(text.equals(uneTable.getValueAt(i, 0).toString()))
						 {
					 		break;
						 }
			 }
			return i;
		}
	
}
