package vue;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.SwingUtilities;

import controleur.Main;

public class vueGeneral extends JFrame implements ActionListener {

	ImageIcon image = new ImageIcon("src/images/ski.jpg");
	JLabel titre = new JLabel (image);
	
	private JMenuBar uneBarre = new JMenuBar();
	private JMenu mnFichier = new JMenu("Fichier");
	private JMenu mnLocations = new JMenu("Locations");
	private JMenu mnReservations = new JMenu("Reservations");
	private JMenu mnClients = new JMenu("Clients");
	private JMenu mnAdmin = new JMenu("Admins");
	private JMenu mnAide = new JMenu("Aide");
	private JMenuItem itemQuitter = new JMenuItem("Quitter");
	private JMenuItem itemApropos = new JMenuItem("A propos");
	private JMenuItem itemEditer = new JMenuItem("Informations..");
	
	private JMenuItem itemDemandes = new JMenuItem("Lister les demandes");
	private vueLocations uneVueLocation = new vueLocations();
	
	private JMenuItem itemLocs = new JMenuItem("Lister les locations");
	private vueListeLoc uneVueListeLoc = new vueListeLoc();
	
	private JMenuItem itemClients = new JMenuItem("Lister les clients");
	private vueClient uneVueClient = new vueClient();
	
	private JMenuItem itemAdmin = new JMenuItem("Lister les admins");
	private vueAdmin uneVueAdmin = new vueAdmin();
	
	private JMenuItem itemDLocs = new JMenuItem("Supprimer une location");
	private vueDListeLoc uneVueDListeLoc = new vueDListeLoc();
	
	private JMenuItem itemDDems = new JMenuItem("Supprimer une demande");
	private vueDLocations uneVueDLocation = new vueDLocations();
	
	private JMenuItem itemDClient = new JMenuItem("Supprimer un client");
	private vueDClient uneVueDClient = new vueDClient();
	
	private JMenuItem itemDAdmin = new JMenuItem("Supprimer un admin");
	private vueDAdmin uneVueDAdmin = new vueDAdmin();
	
	private JMenuItem itemAClient = new JMenuItem("Ajouter un client");
	private vueAClient uneVueAClient = new vueAClient();
	
	private JMenuItem itemAAdmin = new JMenuItem("Ajouter un admin");
	private vueAAdmin uneVueAAdmin = new vueAAdmin();
	
	private JMenuItem itemSClient = new JMenuItem("Modifier un client");
	private vueSClient uneVueSClient = new vueSClient();
	
	private JMenuItem itemSAdmin = new JMenuItem("Modifier un admin");
	private vueSAdmin uneVueSAdmin = new vueSAdmin();
	
	private JMenuItem itemSLocation = new JMenuItem("Modifier une demande");
	private vueSLocation uneVueSLocation = new vueSLocation();
	
	private JMenuItem itemSListeLoc = new JMenuItem("Modifier une location");
	private vueSListeLoc uneVueSListeLoc = new vueSListeLoc();
	
	public vueGeneral() {
		this.setBounds(300,50,800,600);
		this.setLayout(null);
		ImageIcon logo = new ImageIcon("src/images/icone.png");
		this.setIconImage(logo.getImage());
		this.setTitle("Panel d'administration");
		this.setVisible(true);
		this.setResizable(false);
		this.uneBarre.add(this.mnFichier);
		this.uneBarre.add(this.mnLocations);
		this.uneBarre.add(this.mnReservations);
		this.uneBarre.add(this.mnClients);
		this.uneBarre.add(this.mnAdmin);
		this.uneBarre.add(this.mnAide);
		this.mnFichier.add(this.itemQuitter);
		this.itemQuitter.addActionListener(this);
		this.mnFichier.add(this.itemEditer);
		
		this.mnReservations.add(this.itemDemandes);
		this.uneVueLocation.setVisible(false);
		this.add(this.uneVueLocation);
		this.itemDemandes.addActionListener(this);
		
		this.mnLocations.add(this.itemLocs);
		this.uneVueListeLoc.setVisible(false);
		this.add(this.uneVueListeLoc);
		this.itemLocs.addActionListener(this);
		
		this.mnClients.add(this.itemClients);
		this.uneVueClient.setVisible(false);
		this.add(this.uneVueClient);
		this.itemClients.addActionListener(this);
		
		this.mnAdmin.add(this.itemAdmin);
		this.uneVueAdmin.setVisible(false);
		this.add(this.uneVueAdmin);
		this.itemAdmin.addActionListener(this);
		
		this.mnReservations.add(this.itemDDems);
		this.uneVueDLocation.setVisible(false);
		this.add(this.uneVueDLocation);
		this.itemDDems.addActionListener(this);
		
		this.mnLocations.add(this.itemDLocs);
		this.uneVueDListeLoc.setVisible(false);
		this.add(this.uneVueDListeLoc);
		this.itemDLocs.addActionListener(this);
		
		this.mnClients.add(this.itemDClient);
		this.uneVueDClient.setVisible(false);
		this.add(this.uneVueDClient);
		this.itemDClient.addActionListener(this);
		
		this.mnAdmin.add(this.itemDAdmin);
		this.uneVueDAdmin.setVisible(false);
		this.add(this.uneVueDAdmin);
		this.itemDAdmin.addActionListener(this);
		
		this.mnClients.add(this.itemAClient);
		this.uneVueAClient.setVisible(false);
		this.add(this.uneVueAClient);
		this.itemAClient.addActionListener(this);
		
		this.mnAdmin.add(this.itemAAdmin);
		this.uneVueAAdmin.setVisible(false);
		this.add(this.uneVueAAdmin);
		this.itemAAdmin.addActionListener(this);
		
		this.mnClients.add(this.itemSClient);
		this.uneVueSClient.setVisible(false);
		this.add(this.uneVueSClient);
		this.itemSClient.addActionListener(this);
		
		this.mnAdmin.add(this.itemSAdmin);
		this.uneVueSAdmin.setVisible(false);
		this.add(this.uneVueSAdmin);
		this.itemSAdmin.addActionListener(this);
		
		this.mnReservations.add(this.itemSLocation);
		this.uneVueSLocation.setVisible(false);
		this.add(this.uneVueSLocation);
		this.itemSLocation.addActionListener(this);
		
		this.mnLocations.add(this.itemSListeLoc);
		this.uneVueSListeLoc.setVisible(false);
		this.add(this.uneVueSListeLoc);
		this.itemSListeLoc.addActionListener(this);
		
		this.mnAide.add(this.itemApropos);
		this.setJMenuBar(this.uneBarre);
		
		titre.setBounds(0,0,800,600);
		this.add(titre);
		
		
	}

	public void actionPerformed(ActionEvent e) {
		if(e.getSource()==this.itemDemandes){
			this.uneVueLocation.setVisible(true);
			if(this.uneVueClient.isVisible() == true) {
				this.uneVueClient.setVisible(false);
			}
			else if(this.uneVueAClient.isVisible() == true) {
				this.uneVueAClient.setVisible(false);
			}
			else if(this.uneVueAAdmin.isVisible() == true) {
				this.uneVueAAdmin.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemAClient){
			this.uneVueAClient.setVisible(true);
			if(this.uneVueClient.isVisible() == true) {
				this.uneVueClient.setVisible(false);
			}
			else if(this.uneVueLocation.isVisible() == true) {
				this.uneVueLocation.setVisible(false);
			}
			else if(this.uneVueAAdmin.isVisible() == true) {
				this.uneVueAAdmin.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemAAdmin){
			this.uneVueAAdmin.setVisible(true);
			if(this.uneVueClient.isVisible() == true) {
				this.uneVueClient.setVisible(false);
			}
			else if(this.uneVueLocation.isVisible() == true) {
				this.uneVueLocation.setVisible(false);
			}
			else if(this.uneVueAClient.isVisible() == true) {
				this.uneVueAClient.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemClients){
			this.uneVueClient.setVisible(true);
			if(this.uneVueLocation.isVisible() == true) {
				this.uneVueLocation.setVisible(false);
			}
			else if(this.uneVueAClient.isVisible() == true) {
				this.uneVueAClient.setVisible(false);
			}
			else if(this.uneVueAAdmin.isVisible() == true) {
				this.uneVueAAdmin.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemAdmin){
			this.uneVueAdmin.setVisible(true);
			if(this.uneVueListeLoc.isVisible() == true) {
				this.uneVueListeLoc.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemLocs){
			this.uneVueListeLoc.setVisible(true);
			if(this.uneVueAdmin.isVisible() == true) {
				this.uneVueAdmin.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemDDems){
			this.uneVueDLocation.setVisible(true);
			if(this.uneVueDListeLoc.isVisible() == true) {
				this.uneVueDListeLoc.setVisible(false);
			}
			if(this.uneVueDClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueDAdmin.isVisible() == true) {
				this.uneVueDAdmin.setVisible(false);
			}
			else if(this.uneVueSAdmin.isVisible() == true) {
				this.uneVueSAdmin.setVisible(false);
			}
			else if(this.uneVueSClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemDLocs){
			this.uneVueDListeLoc.setVisible(true);
			if(this.uneVueDLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
			if(this.uneVueDClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueDAdmin.isVisible() == true) {
				this.uneVueDAdmin.setVisible(false);
			}
			else if(this.uneVueSAdmin.isVisible() == true) {
				this.uneVueSAdmin.setVisible(false);
			}
			else if(this.uneVueSClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemDClient){
			this.uneVueDClient.setVisible(true);
			if(this.uneVueDLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
			else if(this.uneVueDListeLoc.isVisible() == true) {
				this.uneVueDListeLoc.setVisible(false);
			}
			else if(this.uneVueDAdmin.isVisible() == true) {
				this.uneVueDAdmin.setVisible(false);
			}
			else if(this.uneVueSAdmin.isVisible() == true) {
				this.uneVueSAdmin.setVisible(false);
			}
			else if(this.uneVueSClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemDAdmin){
			this.uneVueDAdmin.setVisible(true);
			if(this.uneVueDLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
			else if(this.uneVueDListeLoc.isVisible() == true) {
				this.uneVueDListeLoc.setVisible(false);
			}
			else if(this.uneVueDClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSAdmin.isVisible() == true) {
				this.uneVueSAdmin.setVisible(false);
			}
			else if(this.uneVueSClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemSClient){
			this.uneVueSClient.setVisible(true);
			if(this.uneVueDLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
			else if(this.uneVueDListeLoc.isVisible() == true) {
				this.uneVueDListeLoc.setVisible(false);
			}
			else if(this.uneVueDClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSAdmin.isVisible() == true) {
				this.uneVueSAdmin.setVisible(false);
			}
			else if(this.uneVueDAdmin.isVisible() == true) {
				this.uneVueDAdmin.setVisible(false);
			}
			else if(this.uneVueSLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemSAdmin){
			this.uneVueSAdmin.setVisible(true);
			if(this.uneVueDLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
			else if(this.uneVueDListeLoc.isVisible() == true) {
				this.uneVueDListeLoc.setVisible(false);
			}
			else if(this.uneVueDClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueDAdmin.isVisible() == true) {
				this.uneVueDAdmin.setVisible(false);
			}
			else if(this.uneVueSClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemSLocation){
			this.uneVueSLocation.setVisible(true);
			if(this.uneVueDLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
			else if(this.uneVueDListeLoc.isVisible() == true) {
				this.uneVueDListeLoc.setVisible(false);
			}
			else if(this.uneVueDClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSAdmin.isVisible() == true) {
				this.uneVueSAdmin.setVisible(false);
			}
			else if(this.uneVueSClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueDAdmin.isVisible() == true) {
				this.uneVueDAdmin.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemSListeLoc){
			this.uneVueSListeLoc.setVisible(true);
			if(this.uneVueDLocation.isVisible() == true) {
				this.uneVueDLocation.setVisible(false);
			}
			else if(this.uneVueDListeLoc.isVisible() == true) {
				this.uneVueDListeLoc.setVisible(false);
			}
			else if(this.uneVueDClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueSAdmin.isVisible() == true) {
				this.uneVueSAdmin.setVisible(false);
			}
			else if(this.uneVueSClient.isVisible() == true) {
				this.uneVueDClient.setVisible(false);
			}
			else if(this.uneVueDAdmin.isVisible() == true) {
				this.uneVueDAdmin.setVisible(false);
			}
		}
		
		if(e.getSource()==this.itemQuitter){
			this.dispose();
			Main.rendreVisible(true);
			//System.exit(0);
		}
		
	}
	
	
	
}
