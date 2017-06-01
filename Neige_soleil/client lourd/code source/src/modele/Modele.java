package modele;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import controleur.Profil;

public class Modele {
	public static ArrayList<Profil> selectAll() {
		String requete = "select * from admin ;";
		ArrayList<Profil> lesProfils = new ArrayList<Profil>();
		
		try {
			BDD uneBdd = new BDD ("localhost", "locationski", "root", "");
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			ResultSet unRes = unStat.executeQuery(requete);
			while (unRes.next())// tant qu'il y a un tuple
			{
				String idC = unRes.getString("pseudo");
				String password = unRes.getString("mdp");
				String prenom = unRes.getString("prenom");
				String nom = unRes.getString("nom");
				
				Profil unProfil = new Profil(idC, nom, prenom, password); 
				lesProfils.add(unProfil);
			}
			unStat.close();
			unRes.close();
			uneBdd.seDeconnecter();
		}
		catch(SQLException exp) {
			System.out.println("Erreur d'execution de "+requete);
		}
		return lesProfils;
	}
	
	public static Profil verifConnexion(String nom, String password) {
		Profil unProfil = null;
		String requete = "select * from admin " + " where nom ='"+nom+"' and password = md5('"+password+"');";
		
		try{
			BDD uneBdd = new BDD("localhost", "locationski", "root","");
			uneBdd.seConnecter();
			Statement unStat = uneBdd.getMaConnexion().createStatement();
			ResultSet unRes = unStat.executeQuery(requete);
			if (unRes.next()) {
				String idC = unRes.getString("idC");
				String prenom = unRes.getString("prenom");
				unProfil = new Profil(idC, nom, prenom, password);
			}
			uneBdd.seDeconnecter();
			unStat.close();
			unRes.close();
		}
		catch (SQLException exp) {
			System.out.println("Erreur de la requete "+requete);
		}
		return unProfil;
	}
}
