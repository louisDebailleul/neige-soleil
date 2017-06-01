package modele;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import com.mysql.jdbc.PreparedStatement;

import controleur.ListeLoc;

public class ModeleListeLoc {
	
	public static int StringToInt(String s) {
		Integer ger = new Integer(s);
		int id = ger.intValue();
		return id;
	}
	
	public static ArrayList<ListeLoc> selectAll() {
		String requete = "select idL, Nom, chambre, place, ville, adresse, codeP, vallee, prixJ, prixS, detail, douche, locataire_id from location ;";
		ArrayList<ListeLoc> lesListeLocs = new ArrayList<ListeLoc>();
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			ResultSet unRes = unStat.executeQuery(requete);
			while (unRes.next())// tant qu'il y a un tuple
			{
				int idL = unRes.getInt("idL");
				String Nom = unRes.getString("Nom");
				int chambre = unRes.getInt("chambre");
				int place = unRes.getInt("place");
				String ville = unRes.getString("ville");
				String adresse = unRes.getString("adresse");
				String codeP = unRes.getString("codeP");
				String vallee = unRes.getString("vallee");
				float prixJ = unRes.getFloat("prixJ");
				float prixS = unRes.getFloat("prixS");
				String detail = unRes.getString("detail");
				int douche = unRes.getInt("douche");
				int locataire_id = unRes.getInt("locataire_id");
				
				ListeLoc uneListeLoc = new ListeLoc(idL, Nom, chambre, place, ville, adresse, codeP, vallee, prixJ, prixS, detail, douche, locataire_id); 
				lesListeLocs.add(uneListeLoc);
			}
			unStat.close();
			unRes.close();
			uneBdd.seDeconnecter();
		}
		catch(SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
		return lesListeLocs;
	}
	
	public static void delete(int id) {
		String requete = "delete from location where idL = "+id+" ;";
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			java.sql.PreparedStatement prepare = uneBdd.getMaConnexion().prepareStatement("delete from location where idL = ? ;");
			System.out.println("La location "+id+" a été correctement supprimée.");
			prepare.setInt(1, id);
			prepare.executeUpdate();
			
			unStat.close();
			uneBdd.seDeconnecter();
		}
		catch (SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
	}
	
	public static void confirmation(int id) {
		String requete = "delete from location where idL = "+id+" ;";
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			java.sql.PreparedStatement prepare = uneBdd.getMaConnexion().prepareStatement("delete from location where idL = ? ;");
			System.out.println("La location "+id+" a été correctement supprimée.");
			prepare.setInt(1, id);
			prepare.executeUpdate();
			
			unStat.close();
			uneBdd.seDeconnecter();
		}
		catch (SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
	}
	
	public static void set(int id, String Champ, String Value) {
		String requete = "update location set "+Value+" = '"+Champ+"' where idL = "+id+" ;";
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			unStat.execute(requete);
			javax.swing.JOptionPane.showMessageDialog(null,"La location a été correctement modifié"); 
			unStat.close();
			uneBdd.seDeconnecter();
		}
		catch (SQLException exp) {
			javax.swing.JOptionPane.showMessageDialog(null,"Erreur d'execution de "+requete); 
		}
	}
}