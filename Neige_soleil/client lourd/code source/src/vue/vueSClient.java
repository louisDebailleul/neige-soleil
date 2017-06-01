package vue;

import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.awt.Color;
import java.awt.Font;
import java.awt.Insets;
import java.awt.event.ActionEvent;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;

import controleur.Client;
import modele.ModeleClient;

public class vueSClient extends JPanel implements ActionListener {
	
	private JComboBox liste;
	private JButton btClose = new JButton("X");
	private JTextField txtID = new JTextField();
	private JTextField txtChamp = new JTextField();
	private JButton btModify = new JButton("Modifier");
	private JLabel consigne = new JLabel("ID : ");
	private JLabel consigne2 = new JLabel("Champ : ");
	Font f = new Font("Arial", Font.BOLD, 12);
	
	public vueSClient(){
		Object[] elements = new Object[]{"Nom","Prenom","Email","Ville","Adresse","CodeP","Tel"};
		
		liste = new JComboBox(elements);
		
		this.setBounds(20,475,750,40);
		this.setBackground(Color.white);
		this.setLayout(null);
		this.add(this.liste);
		this.add(this.txtID);
		this.add(this.txtChamp);
		this.add(this.btModify);
		this.add(this.btClose);
		this.add(this.consigne);
		this.add(this.consigne2);
		this.consigne.setBounds(20,9,50,20);
		this.txtID.setBounds(40, 10, 50, 20);
		this.consigne2.setBounds(155,9,50,20);
		this.txtChamp.setBounds(205, 10, 150, 20);
		this.liste.setBounds(500, 10, 150, 20);
		this.btModify.addActionListener(this);
		this.btModify.setBounds(385,5,100,30);
		this.btClose.addActionListener(this);
		this.btClose.setFont(f);
		this.btClose.setForeground(Color.WHITE);
		this.btClose.setMargin(new Insets(0, 0, 0, 0));
		this.btClose.setBounds(730,0,20,20);
		this.btClose.setBackground(Color.red);
		
		this.setVisible(true);
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		if (e.getSource()==this.btClose) {
			this.setVisible(false);
		}
		
		if (e.getSource()==this.btModify) {
			ModeleClient.set(ModeleClient.StringToInt(this.txtID.getText()),this.txtChamp.getText(),this.liste.getSelectedItem().toString());
		}
	}
}