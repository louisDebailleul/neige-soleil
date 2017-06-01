package vue;

import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.awt.Color;
import java.awt.Font;
import java.awt.Insets;
import java.awt.event.ActionEvent;

import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;

import controleur.Location;
import modele.ModeleLocation;

public class vueLocations extends JPanel implements ActionListener {
	
	private JTable uneTable;
	private JButton btClose = new JButton("X");
	private JLabel title = new JLabel("Demandes");
	Font f = new Font("Arial", Font.BOLD, 12);
	
	public vueLocations(){
		this.setBounds(20,20,750,200);
		this.setBackground(Color.white);
		this.setLayout(null);
		String entete[]={"id","Message","Date Début","Date Fin","Confirmation","ID_Location","ID_Client","Date Demande","Acompte"};
		this.uneTable = new JTable(this.remplirDonnees(), entete);
		JScrollPane uneScroll = new JScrollPane(this.uneTable);
		uneScroll.setBounds(0,20,750,180);
		this.add(uneScroll);
		this.add(this.btClose);
		this.add(this.title);
		this.title.setBounds(10, 4, 100, 10);
		this.btClose.addActionListener(this);
		this.btClose.setFont(f);
		this.btClose.setForeground(Color.WHITE);
		this.btClose.setMargin(new Insets(0, 0, 0, 0));
		this.btClose.setBounds(730,0,20,20);
		this.btClose.setBackground(Color.red);
		
		this.setVisible(true);
	}
	
	public Object[][] remplirDonnees() {
		ArrayList<Location> lesLocations = ModeleLocation.selectAll();
		Object donnees [][] = new Object[lesLocations.size()][9];
		int i = 0;
		for (Location uneLocation : lesLocations) {
			donnees[i][0] = uneLocation.getId();
			donnees[i][1] = uneLocation.getMessage();
			donnees[i][2] = uneLocation.getDateD();
			donnees[i][3] = uneLocation.getDateF();
			donnees[i][4] = uneLocation.getConfirme();
			donnees[i][5] = uneLocation.getLocation_id();
			donnees[i][6] = uneLocation.getClient_id();
			donnees[i][7] = uneLocation.getDateDemande();
			donnees[i][8] = uneLocation.getAcompte();
			i++;
		}
		
		return donnees;
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		if (e.getSource()==this.btClose) {
			this.setVisible(false);
		}
	}
}

