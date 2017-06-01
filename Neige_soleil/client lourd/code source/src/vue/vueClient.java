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
import javax.swing.SwingUtilities;
import javax.swing.table.DefaultTableModel;

import controleur.Client;
import modele.ModeleClient;

public class vueClient extends JPanel implements ActionListener {
	
	private  static JTable uneTable;
	private JButton btClose = new JButton("X");
	private JLabel title = new JLabel("Clients");
	Font f = new Font("Arial", Font.BOLD, 12);
	private  static JScrollPane uneScroll;
	public vueClient(){
		this.setBounds(20,20,750,200);
		this.setBackground(Color.white);
		this.setLayout(null);
		String entete[]={"ID","Nom","Mot de Passe","Prenom","Email","Ville","Adresse","Code Postal","Telephone"};
		uneTable = new JTable(new DefaultTableModel(remplirDonnees(), entete));
		uneScroll = new JScrollPane(uneTable);
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
	
	public static Object[][] remplirDonnees() {
		ArrayList<Client> lesClients = ModeleClient.selectAll();
		Object donnees [][] = new Object[lesClients.size()][9];
		int i = 0;
		for (Client unClient : lesClients) {
			donnees[i][0] = unClient.getIdC();
			donnees[i][1] = unClient.getNom();
			donnees[i][2] = unClient.getPassword();
			donnees[i][3] = unClient.getPrenom();
			donnees[i][4] = unClient.getEmail();
			donnees[i][5] = unClient.getVille();
			donnees[i][6] = unClient.getAdresse();
			donnees[i][7] = unClient.getCodeP();
			donnees[i][8] = unClient.getTel();
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

	public static JTable getUneTable() {
		return uneTable;
	}

	public static void setUneTable(JTable uneTable) {
		vueClient.uneTable = uneTable;
	}
}