package modele;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import controleur.Location;

public class ModeleLocation {
	
	public static int StringToInt(String s) {
		Integer ger = new Integer(s);
		int id = ger.intValue();
		return id;
	}
	
	public static ArrayList<Location> selectAll() {
		String requete = "select * from demande ;";
		ArrayList<Location> lesLocations = new ArrayList<Location>();
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			ResultSet unRes = unStat.executeQuery(requete);
			while (unRes.next())// tant qu'il y a un tuple
			{
				int id = unRes.getInt("id");
				String message = unRes.getString("message");
				String dateD = unRes.getString("dateD");
				String dateF = unRes.getString("dateF");
				String confirme = unRes.getString("confirme");
				int location_id = unRes.getInt("location_id");
				int client_id = unRes.getInt("client_id");
				String dateDemande = unRes.getString("dateDemande");
				float acompte = unRes.getFloat("acompte");
				
				Location uneLocation = new Location(id, message, dateD, dateF, confirme, location_id, client_id, dateDemande, acompte); 
				lesLocations.add(uneLocation);
			}
			unStat.close();
			unRes.close();
			uneBdd.seDeconnecter();
		}
		catch(SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
		return lesLocations;
	}
	
	public static void delete(int id) {
		String requete = "delete from demande where id = "+id+" ;";
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			java.sql.PreparedStatement prepare = uneBdd.getMaConnexion().prepareStatement("delete from demande where id = ? ;");
			System.out.println("La demande "+id+" a été correctement supprimée.");
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
		String requete = "update demande set "+Value+" = '"+Champ+"' where id = "+id+" ;";
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			unStat.execute(requete);
			unStat.close();
			uneBdd.seDeconnecter();
			javax.swing.JOptionPane.showMessageDialog(null,"La demande de location a été correctement modifié"); 
		}
		catch (SQLException exp) {
			javax.swing.JOptionPane.showMessageDialog(null,"Erreur d'execution de "+requete); 
		}
	}
	
}