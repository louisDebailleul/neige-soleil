package controleur;

public class Location {
	int id, location_id, client_id;
	private String message, dateD, dateF, dateDemande, confirme;
	float acompte;
	
	public Location()
	{
		this.id=0;
		this.location_id=0;
		this.client_id=0;
		this.message = this.dateD = this.dateF = this.dateDemande = this.confirme = "";
		this.acompte=0;
	}
	
	public Location(int id, String message, String dateD, String dateF, String confirme, int location_id, int client_id, String dateDemande, float acompte) {
		this.id = id;
		this.message = message;
		this.dateD = dateD;
		this.dateF = dateF;
		this.confirme = confirme;
		this.location_id = location_id;
		this.client_id = client_id;
		this.dateDemande = dateDemande;
		this.acompte = acompte;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getConfirme() {
		return confirme;
	}

	public void setConfirme(String confirme) {
		this.confirme = confirme;
	}

	public int getLocation_id() {
		return location_id;
	}

	public void setLocation_id(int location_id) {
		this.location_id = location_id;
	}

	public int getClient_id() {
		return client_id;
	}

	public void setClient_id(int client_id) {
		this.client_id = client_id;
	}

	public String getMessage() {
		return message;
	}

	public void setMessage(String message) {
		this.message = message;
	}

	public String getDateD() {
		return dateD;
	}

	public void setDateD(String dateD) {
		this.dateD = dateD;
	}

	public String getDateF() {
		return dateF;
	}

	public void setDateF(String dateF) {
		this.dateF = dateF;
	}

	public String getDateDemande() {
		return dateDemande;
	}

	public void setDateDemande(String dateDemande) {
		this.dateDemande = dateDemande;
	}

	public float getAcompte() {
		return acompte;
	}

	public void setAcompte(float acompte) {
		this.acompte = acompte;
	}
	
	
}
