package modele;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import controleur.Client;

public class ModeleClient {
	
	public static int StringToInt(String s) {
		Integer ger = new Integer(s);
		int id = ger.intValue();
		return id;
	}
	
	public static ArrayList<Client> selectAll() {
		String requete = "select * from client ;";
		ArrayList<Client> lesClients = new ArrayList<Client>();
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			ResultSet unRes = unStat.executeQuery(requete);
			while (unRes.next())// tant qu'il y a un tuple
			{
				int idC = unRes.getInt("idC");
				String nom = unRes.getString("nom");
				String password = unRes.getString("password");
				String prenom = unRes.getString("prenom");
				String email = unRes.getString("email");
				String ville = unRes.getString("ville");
				String adresse = unRes.getString("adresse");
				String codeP = unRes.getString("codeP");
				String tel = unRes.getString("tel");
				
				Client unClient = new Client(idC, nom, password, prenom, email, ville, adresse, codeP, tel); 
				lesClients.add(unClient);
			}
			unStat.close();
			unRes.close();
			uneBdd.seDeconnecter();
		}
		catch(SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
		return lesClients;
	}
	
	public static void delete(int id) {
		String requete = "delete from client where idC = "+id+" ;";
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			java.sql.PreparedStatement prepare = uneBdd.getMaConnexion().prepareStatement("delete from client where idC = ? ;");
			javax.swing.JOptionPane.showMessageDialog(null,"Le client "+id+" a été correctement supprimé."); 
			prepare.setInt(1, id);
			prepare.executeUpdate();
			
			unStat.close();
			uneBdd.seDeconnecter();
		}
		catch (SQLException exp) {
			javax.swing.JOptionPane.showMessageDialog(null,"Erreur d'execution de "+requete); 
		}
	}
	
	public static void add(String nom, String pwd, String prenom, String email, String ville, String adresse, String code, String tel) {
		String requete = "insert into client values(null,'"+nom+"',md5('"+pwd+"'),'"+prenom+"','"+email+"','"+ville+"','"+adresse+"','"+code+"','"+tel+"') ;";
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			java.sql.PreparedStatement prepare = uneBdd.getMaConnexion().prepareStatement("insert into client values(null,?,md5(?),?,?,?,?,?,?) ;");
			System.out.println("Le client a été correctement ajouté.");
			prepare.setString(1, nom);
			prepare.setString(2, pwd);
			prepare.setString(3, prenom);
			prepare.setString(4, email);
			prepare.setString(5, ville);
			prepare.setString(6, adresse);
			prepare.setString(7, code);
			prepare.setString(8, tel);
			prepare.executeUpdate();
			javax.swing.JOptionPane.showMessageDialog(null,"Le client "+nom+" a été correctement ajouté."); 
			
			unStat.close();
			uneBdd.seDeconnecter();
		}
		catch (SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
	}
	
	public static void set(int id, String Champ, String Value) {
		String requete = "update client set "+Value+" = '"+Champ+"' where idC = "+id+" ;";
		System.out.println("c" + Champ +" v"+Value);
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			unStat.execute(requete);
			unStat.close();
			uneBdd.seDeconnecter();
		}
		catch (SQLException exp) {
			javax.swing.JOptionPane.showMessageDialog(null,"Erreur d'execution de "+requete); 
		}
	}
	
}