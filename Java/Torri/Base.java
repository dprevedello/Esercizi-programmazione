public class Base {
	private Torre[] torri = new Torre[3];
	
	public Base(int difficolta) {
		torri[0] = new Torre(difficolta, true);
		torri[1] = new Torre(difficolta, false);
		torri[2] = new Torre(difficolta, false);
	}

	@Override
	public String toString() {
		String[] t1 = torri[0].toString().split("\n");
		String[] t2 = torri[1].toString().split("\n");
		String[] t3 = torri[2].toString().split("\n");
		
		String result = "";
		for(int i=0; i<t1.length; i++)
			result += t1[i]+t2[i]+t3[i]+"\n";
		
		return result;
	}
}
