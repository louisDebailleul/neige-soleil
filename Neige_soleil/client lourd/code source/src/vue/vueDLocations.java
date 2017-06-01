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

public class vueDLocations extends JPanel implements ActionListener {
	
	private JButton btClose = new JButton("X");
	private JTextField txtID = new JTextField();
	private JButton btDelete = new JButton("Supprimer");
	private JLabel consigne = new JLabel("ID de la demande à supprimer : ");
	Font f = new Font("Arial", Font.BOLD, 12);
	
	public vueDLocations(){
		this.setBounds(20,475,750,40);
		this.setBackground(Color.white);
		this.setLayout(null);
		this.add(this.txtID);
		this.add(this.btDelete);
		this.add(this.btClose);
		this.add(this.consigne);
		this.consigne.setBounds(20,9,180,20);
		this.txtID.setBounds(225, 10, 150, 20);
		this.btDelete.addActionListener(this);
		this.btDelete.setBounds(385,5,100,30);
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
		
		if (e.getSource()==this.btDelete) {
			ModeleLocation.delete(ModeleLocation.StringToInt(this.txtID.getText()));
		}
	}
}