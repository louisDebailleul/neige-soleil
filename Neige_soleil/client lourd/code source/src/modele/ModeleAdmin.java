package modele;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import controleur.Admin;

public class ModeleAdmin {
	
	public static int StringToInt(String s) {
		Integer ger = new Integer(s);
		int id = ger.intValue();
		return id;
	}
	
	public static ArrayList<Admin> selectAll() {
		String requete = "select * from admin ;";
		ArrayList<Admin> lesAdmins = new ArrayList<Admin>();
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			ResultSet unRes = unStat.executeQuery(requete);
			while (unRes.next())// tant qu'il y a un tuple
			{
				int idC = unRes.getInt("idC");
				String nom = unRes.getString("nom");
				String prenom = unRes.getString("prenom");
				String password = unRes.getString("password");
				String email = unRes.getString("email");
				
				Admin unAdmin = new Admin(idC, nom, password, prenom, email); 
				lesAdmins.add(unAdmin);
			}
			unStat.close();
			unRes.close();
			uneBdd.seDeconnecter();
		}
		catch(SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
		return lesAdmins;
	}
	
	public static void delete(int id) {
		String requete = "delete from admin where idC = "+id+" ;";
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			java.sql.PreparedStatement prepare = uneBdd.getMaConnexion().prepareStatement("delete from admin where idC = ? ;");
			System.out.println("Le client "+id+" a été correctement supprimé.");
			prepare.setInt(1, id);
			prepare.executeUpdate();
			
			unStat.close();
			uneBdd.seDeconnecter();
		}
		catch (SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
	}
	
	public static void add(String nom, String prenom, String password, String email) {
		String requete = "insert into admin values(null,'"+nom+"','"+prenom+"',md5('"+password+"'),'"+email+"') ;";
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			java.sql.PreparedStatement prepare = uneBdd.getMaConnexion().prepareStatement("insert into admin values(null,?,?,md5(?),?) ;");
			System.out.println("L'admin a été correctement ajouté.");
			prepare.setString(1, nom);
			prepare.setString(2, prenom);
			prepare.setString(3, password);
			prepare.setString(4, email);
			prepare.executeUpdate();
			javax.swing.JOptionPane.showMessageDialog(null,"L'admin "+nom+" a été correctement ajouté."); 
			
			unStat.close();
			uneBdd.seDeconnecter();
		}
		catch (SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
	}
	
	public static void set(int id, String Champ, String Value) {
		String requete = "update admin set "+Value+" = '"+Champ+"' where idC = "+id+" ;";
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			unStat.execute(requete);
			unStat.close();
			uneBdd.seDeconnecter();
			javax.swing.JOptionPane.showMessageDialog(null,"L'admin a été correctement modifié"); 
		}
		catch (SQLException exp) {
			javax.swing.JOptionPane.showMessageDialog(null,"Erreur d'execution de "+requete); 
		}
	}
	
	
}